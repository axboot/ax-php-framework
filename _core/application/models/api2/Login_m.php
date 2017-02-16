<?php

class Login_m extends RESTAPI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function restPost()
    {
        if(true) {
            // 로그인 성공
            $this->session->set_userdata('is_login', true);
            return true;
        } else {
            // 로그인 실패
            $this->errorMessage = array('message' => 'Unauthorized');
            return false;
        }
    }
}