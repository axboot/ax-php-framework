<?php

class Login_m extends Api_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rest_post_item()
    {
        $this->set_res('data', $this->get_req());
        $this->set_res('post', $this->input->post());

        if(true) {
            $this->session->set_userdata('is_login', true);
        } else {
            $this->set_res('error', array('message' => 'Unauthorized'));
        }
    }
}