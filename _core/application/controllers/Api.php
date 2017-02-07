<?php

/**
 * Description of Api
 *
 * @author hoksi3k@gmail.com
 */
class Api extends CI_Controller {
    protected $resource;
    protected $act;
    protected $id;
    protected $req_method;
    public $_api_model;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->req_method = $this->input->method(false);
        
        // $this->output->enable_profiler();
    }
    
    public function _remap($resource, $params = array())
    {
        if($this->init($resource, $params) !== false) {
            $this->exec_method();
            
            $data = $this->_api_model->get_res();

            // 시스템 로그를 기록한다.
            // $this->log($this->_api_model->get_user_id(), $data);

            $this->view($data);
        } else {
            show_error('Resource not found!');
        }
    }
    
    protected function init($resource, $params)
    {
        if($this->model($resource)) {

            // id = 1,2 ... 숫자
            // act = run, status, check 등 영문자와 숫자로 이루어진 단어
            
            if(count($params) >= 2) {
                $id = isset($params[1]) ? $params[1] : false;
                $act = isset($params[0]) ? $this->req_method . '_' . $params[0] : false;
            } elseif(isset($params[0]) && is_numeric($params[0])) {
                $id = isset($params[0]) ? $params[0] : false;
                $act = false;
            } else {
                $id = false;
                $act = isset($params[0]) ? $this->req_method . '_' . $params[0] : false;
            }
            
            $this->resource = $resource;
            $this->act = $act;
            $this->id = $id;

            return $this;
        }
        
        return false;
    }
    
    protected function view($data)
    {
        $data['response'] = isset($data['response']) ? $data['response'] : 'ok';
        $data['msg'] = isset($data['msg']) ? $data['msg'] : '';
        
        if($data['msg'] == '') {
            unset($data['msg']);
        }
        
        // 데이터 뷰 타입을 json으로 설정
        // $this->output->set_content_type('json')->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
        $this->load->set_content_type('json')->view('json', $data);
    }
    
    protected function model($model)
    {
        $model_path = APPPATH . 'models/api/' . ucfirst($model) . '_m.php';
        
        if(file_exists($model_path)) {
            $this->load->model('api/' . $model . '_m', '_api_model');
            
            return true;
        }
        
        return false;
    }
    
    protected function exec_method()
    {
        /**
         * @todo 인증확인이 필요한지 검사
         */

        if($this->input->get_request_header('Content-Type') == 'application/json') {
            $json_data = json_decode($this->input->raw_input_stream, true);
            if(json_last_error() == JSON_ERROR_NONE) {
                $this->_api_model->set_req($json_data);
            }
        }

        $this->_api_model->set_req($this->input->input_stream());
        switch($this->req_method) {
            case 'get':
                $this->_api_model->set_req($this->input->get());
                $act = $this->id ? 'get_item' : 'list_item';
            break;
        
            case 'post':
                $this->_api_model->set_req($this->input->post());
                $act = 'post_item';
            break;

            case 'put':
                $act = 'put_item';
            break;

            case 'delete':
                $act = 'delete_item';
            break;
        
            default:
                $act = false;
            break;
        }

        if($this->act !== false) {
            if(method_exists($this->_api_model, 'rest_' . $this->act)) {
                return $this->_api_model->{'rest_' . $this->act}($this->id);
            } else {
                show_error('Not define action!(' . $this->act . ')');
            }
        } else {
            if(method_exists($this->_api_model, 'rest_' . $act)) {
                return $this->_api_model->{'rest_' . $act}($this->id);
            } else {
                show_error('Not define method!(' . $this->req_method . ')');
            }
        }
    }

    protected function log($user_id, $data)
    {
    }
}