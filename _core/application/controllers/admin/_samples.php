<?php

class _samples extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function page_structure()
    {
        ax('set', array('pageName' => '페이지구조설명'));
        $this->load->view('admin/_samples/page_structure');
    }
    
    public function vertical_layout()
    {
        // 좌우레이아웃
        ax('set', array('pageName' => '좌우레이아웃'));
        $this->load->view('admin/_samples/vertical_layout');
    }
    
    public function tab_layout()
    {
        ax('set', array('pageName' => '탭레이아웃'));
        $this->load->view('admin/_samples/tab_layout');
    }

    public function basic()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';

        ax('set', array('pageName' => '기본템플릿'));
        $this->load->view('admin/_samples/basic');
    }

    public function grid_form()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';

        ax('set', array('pageName' => '그리드&폼 템플릿	'));
        $this->load->view('admin/_samples/grid_form');
    }

    public function grid_tabform()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';

        ax('set', array('pageName' => '그리드&탭폼 템플릿'));
        $this->load->view('admin/_samples/grid_tabform');
    }

    //grid-modal
    public function grid_modal()
    {
        // 조회메뉴 활성화
        $this->auth_group_menu['schAh'] = 'Y';
        // 저장메뉴 활성화
        $this->auth_group_menu['savAh'] = 'Y';

        ax('set', array('pageName' => '그리드&모달 템플릿'));
        $this->load->view('admin/_samples/grid_modal');
    }

    public function modal()
    {
        $this->load->view('admin/_samples/modal');
    }
}