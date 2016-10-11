<?php

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        switch($this->input->get('progCd')) {
            default:
                $this->dashboard();
                break;
        }
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard/dashboard');
    }
}