<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class auto load
spl_autoload_register(function ($class) {
    switch($class) {
        case 'REST_Controller':
        case 'Restserver\Libraries\REST_Controller':
            include_once APPPATH . 'libraries/REST_Controller.php';
            break;

    }
});

class MY_Controller extends CI_Controller {
    public $user_info;
    public $auth_group_menu;

    public function __construct() {
        parent::__construct();

        $this->auth_group_menu = array(
            'schAh' => 'N', // 조회
            'savAh' => 'N', // 저장
            'exlAh' => 'N', // 엑셀
            'delAh' => 'N', // 삭제
            'fn1Ah' => 'N', // 기능1
            'fn2Ah' => 'N', // 기능2
            'fn3Ah' => 'N', // 기능3
            'fn4Ah' => 'N', // 기능4
            'fn5Ah' => 'N', // 기능5
        );
    }
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();

        if($this->session->userdata('is_login')) {
            $this->user_info = array(
                'userNm' => '시스템 관리자'
            );
        } else {
            redirect('/');
        }
//        if(isset($this->session->id) && intval($this->session->id) > 0) {
//            $this->load->library('aclmapper', null, 'acl');
//
//            $this->user_info = array(
//                'id' => $this->session->id,
//                'name' => $this->session->name,
//                'email' => $this->session->email,
//                'login_id' => $this->session->login_id,
//                'role' => $this->session->role
//            );
//
//            $this->acl->role_chk($this->session->role, $this->uri->uri_string());
//        } else {
//            echo sprintf("<script>alert('잘못된 접근 입니다. 로그인 후 다시 시도 하십시오.');top.location.replace('/?ref=%s');</script>", rawurlencode($this->uri->uri_string()));
//        }
    }
}

// Rest API 컨트롤러
class RESTAPI_Controller extends \Restserver\Libraries\REST_Controller {
    protected $version = 'v1';

    /** @var RESTAPI_Model $_api_model_ */
    public $_api_model_ = null;

    public function __construct($config = 'rest') {
        parent::__construct($config);
    }

    public function _remap($object_called, $arguments = array()) {

        print_r($object_called);
        echo '<br/>';
        print_r($arguments);

        // Should we answer if not over SSL?
        if ($this->config->item('force_https') && $this->request->ssl === FALSE)
        {
            $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unsupported')
            ], self::HTTP_FORBIDDEN);
        }

        $object_called = array_shift($arguments);

        // Remove the supported format from the function name e.g. index.json => index
        $object_called = strtolower(preg_replace('/^(.*)\.(?:'.implode('|', array_keys($this->_supported_formats)).')$/', '$1', $object_called) . '_model');

        $model_file = ucfirst($object_called);
        $controller_method = $object_called.'_'.$this->request->method;

        $class_name = $this->router->directory ? $this->router->directory . '/' . $this->router->class : $this->router->class;

        // API와 연결된 모델파일이 있는지 확인한다.
        if(file_exists(APPPATH . 'models/' . $class_name . '/' . $this->version . '/' . $model_file . '.php')) {
            $this->load->model($class_name . '/' . $this->version . '/' . $object_called, '_api_model_');
        }

        // Do we want to log this method (if allowed by config)?
        $log_method = ! (isset($this->methods[$controller_method]['log']) && $this->methods[$controller_method]['log'] === FALSE);

        // Use keys for this method?
        $use_key = ! (isset($this->methods[$controller_method]['key']) && $this->methods[$controller_method]['key'] === FALSE);

        // They provided a key, but it wasn't valid, so get them out of here
        if ($this->config->item('rest_enable_keys') && $use_key && $this->_allow === FALSE)
        {
            if ($this->config->item('rest_enable_logging') && $log_method)
            {
                $this->_log_request();
            }

            // fix cross site to option request error
            if($this->request->method == 'options') {
                exit;
            }

            $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => sprintf($this->lang->line('text_rest_invalid_api_key'), $this->rest->key)
            ], self::HTTP_FORBIDDEN);
        }

        // Check to see if this key has access to the requested controller
        if ($this->config->item('rest_enable_keys') && $use_key && empty($this->rest->key) === FALSE && $this->_check_access() === FALSE)
        {
            if ($this->config->item('rest_enable_logging') && $log_method)
            {
                $this->_log_request();
            }

            $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_unauthorized')
            ], self::HTTP_UNAUTHORIZED);
        }

        // Sure it exists, but can they do anything with it?
        if (! method_exists($this, $this->version))
        {
            $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unknown_method')
            ], self::HTTP_METHOD_NOT_ALLOWED);
        }

        // Doing key related stuff? Can only do it if they have a key right?
        if ($this->config->item('rest_enable_keys') && empty($this->rest->key) === FALSE)
        {
            // Check the limit
            if ($this->config->item('rest_enable_limits') && $this->_check_limit($controller_method) === FALSE)
            {
                $response = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_time_limit')];
                $this->response($response, self::HTTP_UNAUTHORIZED);
            }

            // If no level is set use 0, they probably aren't using permissions
            $level = isset($this->methods[$controller_method]['level']) ? $this->methods[$controller_method]['level'] : 0;

            // If no level is set, or it is lower than/equal to the key's level
            $authorized = $level <= $this->rest->level;
            // IM TELLIN!
            if ($this->config->item('rest_enable_logging') && $log_method)
            {
                $this->_log_request($authorized);
            }
            if($authorized === FALSE)
            {
                // They don't have good enough perms
                $response = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_permissions')];
                $this->response($response, self::HTTP_UNAUTHORIZED);
            }
        }

        //check request limit by ip without login
        elseif ($this->config->item('rest_limits_method') == "IP_ADDRESS" && $this->config->item('rest_enable_limits') && $this->_check_limit($controller_method) === FALSE)
        {
            $response = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_ip_address_time_limit')];
            $this->response($response, self::HTTP_UNAUTHORIZED);
        }

        // No key stuff, but record that stuff is happening
        elseif ($this->config->item('rest_enable_logging') && $log_method)
        {
            $this->_log_request($authorized = TRUE);
        }

        // Call the controller method and passed arguments
        try
        {
            $this->{$this->version}($this->request->method, $arguments);
        }
        catch (Exception $ex)
        {
            // If the method doesn't exist, then the error will be caught and an error response shown
            $_error = &load_class('Exceptions', 'core');
            $_error->show_exception($ex);
        }
    }

    public function set_version($version)
    {
        $this->version = $version;

        return $this;
    }
}