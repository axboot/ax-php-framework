<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016-10-14
 * Time: 오후 5:09
 */
class Common extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function zipcode()
    {
        $this->load->view('admin/common/zipcode');
    }
}