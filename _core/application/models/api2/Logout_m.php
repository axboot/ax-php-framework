<?php

class Logout_m extends RESTAPI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function restGet($id = false)
    {
        $this->session->set_userdata('is_login', false);
        
        redirect('/');
    }
}