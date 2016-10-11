<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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