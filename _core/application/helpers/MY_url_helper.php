<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 커스텀 태그 랩퍼 함수
if(!function_exists('ct')) {
    function ct($tag, $vars = '')
    {
        static $ob_start_markdown = false;

        $ci = &get_instance();

        $tag = strtolower($tag);

        if($tag == 'loginuser') {
            return (is_string($vars) && isset($ci->user_info[$vars]) ? $ci->user_info[$vars] : '');
        } elseif($tag == 'authgroupmenu') {
            return (is_string($vars) && isset($ci->auth_group_menu[$vars]) ? $ci->auth_group_menu[$vars] : '');
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
        } elseif($tag == 'markdown') {
            if(is_array($vars) && isset($vars['src'])) {
                return $ci->load->tag($tag, $vars);
            } else {
                $ob_start_markdown = true;
                ob_start();
            }
        } elseif($tag == '/markdown') {
            if($ob_start_markdown) {
                $ob_start_markdown = false;
                return \Michelf\MarkdownExtra::defaultTransform(ob_get_clean());
            } else {
                return $ci->load->tag($tag, $vars);
            }
        } elseif($tag == 'set') {
            $ci->load->vars($vars);
        } elseif($tag == 'get') {
            return (is_string($vars) ? $ci->load->get_var($vars) : '');
        } elseif($tag == 'setattr') {
            if(is_array($vars) && !empty($vars)) {
                foreach($vars as $key => $val) {
                    $ci->load->vars('_custum_tag_' . $key, $val);
                }
            }
        } elseif($tag == 'attr') {
            return (is_string($vars) ? $ci->load->get_var('_custum_tag_' . $vars) : '');
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