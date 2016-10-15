<?php

class _apis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function axboot_js()
    {
        ax('set', array('pageName' => 'AXBOOT.js'));
        $this->load->view('admin/_apis/axboot_js');
    }

    public function ax_phase_auth()
    {
        ax('set', array('pageName' => 'ax-phase-auth'));
        $this->load->view('admin/_apis/ax_phase_auth');
    }

    //form-example
    public function form_example()
    {
        ax('set', array('pageName' => '폼사용법	'));
        $this->load->view('admin/_apis/form_example');
    }
}