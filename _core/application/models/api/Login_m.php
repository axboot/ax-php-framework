<?php

class Login_m extends Api_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rest_get_item($id = false)
    {
        $this->set_res('status', true);
    }

    public function rest_post_item()
    {
        $this->set_res('data', $this->get_req());
        $this->set_res('post', $this->input->post());
        $this->set_res('error', array('message' => 'Unauthorized'));
    }
}