<?php

class System extends Admin_Controller
{
    protected $menu_id;

    public function __construct()
    {
        parent::__construct();

        $this->menu_id = $this->input->get('menuId');
    }

    public function system_config_common_code()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';
        // 제목
        ax('set', array('pageName' => '공통코드 관리'));

        $this->load->view('admin/system/system_config_common_code');
    }

    public function system_config_program()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';
        // 제목
        ax('set', array('pageName' => '프로그램 관리'));
        
        $this->load->view('admin/system/system_config_program');
    }
    
    public function system_config_menu()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';
        // 제목
        ax('set', array('pageName' => '메뉴관리'));

        $this->load->view('admin/system/system_config_menu');
    }
    
    public function system_auth_user()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';
        // 제목
        ax('set', array('pageName' => '사용자 관리'));

        $this->load->view('admin/system/system_auth_user');
    }
}