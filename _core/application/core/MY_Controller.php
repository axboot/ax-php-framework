<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public $user_info;

    public function __construct() {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();

        $this->user_info = array(
            'userNm' => '시스템 관리자'
        );
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