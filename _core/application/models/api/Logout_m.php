<?php

class Logout_m extends Api_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rest_list_item($id = false)
    {
        $this->session->set_userdata('is_login', false);
        redirect('/');
    }
}