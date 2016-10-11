<?php

class System extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function system_config_common_code()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';
        ax('set', array('pageName' => '공통코드 관리'));

        $this->load->view('admin/system/system_config_common_code');
    }
}