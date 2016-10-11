<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 커스텀 태그 랩퍼 함수
if(!function_exists('ct')) {
    function ct($tag, $vars = '')
    {
        $ci = &get_instance();

        $tag = strtolower($tag);

        if($tag == 'loginuser') {
            return (is_string($vars) && isset($ci->user_info[$vars]) ? $ci->user_info[$vars] : '');
        } elseif($tag == 'dobody') {
            return $ci->load->get_var('__view_content__');
        } elseif($tag == 'url') {
            return (is_string($vars) ? base_url($vars) : '');
        } elseif($tag == 'siteurl') {
            return (is_string($vars) ? site_url($vars) : '');
        } elseif($tag == 'js') {
            $ci->load->set_js($vars);
        } elseif($tag == 'css') {
            $ci->load->set_css($vars);
        } elseif($tag == 'layout') {
            $ci->load->set_layout($vars);
        } elseif($tag == '/layout') {
            return '';
        } elseif($tag == 'set') {
            $ci->load->vars($vars);
        } elseif($tag == 'get') {
            return (is_string($vars) ? $ci->load->get_var($vars) : '');
        } else {
            return $ci->load->tag($tag, $vars);
        }

        return '';
    }
}

// 커스텀 태그 별칭 함수
if(!function_exists('ax')) {
    function ax($tag, $vars = array())
    {
        return ct($tag, $vars);
    }
}