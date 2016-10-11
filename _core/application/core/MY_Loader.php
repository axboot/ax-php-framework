<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    protected $ci;
    protected $_layout;
    protected $_content_type;
    protected $_js;
    protected $_css;

    public function __construct()
    {
        parent::__construct();

        $this->ci = &get_instance();
        $this->_layout = NULL;
        $this->_js = array();
        $this->_css = array();

        $this->_content_type = config_item('url_suffix') == '.json' ? 'json' : 'html';
    }

    public function view($view, $vars = array(), $return = FALSE)
    {
        if($this->_content_type == 'json') {
            $vars = array_merge($this->_ci_cached_vars, $vars);
            if($return) {
                return json_encode($vars);
            }

            $this->ci->output->set_content_type('json')->set_output(json_encode($vars, JSON_UNESCAPED_UNICODE));
        } else {
            $content = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => true));
            if($this->_layout == NULL) {
                if($return) {
                    return $content;
                }

                $this->ci->output->append_output($content);
            } else {
                $layout = $this->_layout;
                $this->_layout = NULL;
                $this->vars('__view_content__', $content);

                return $this->_ci_load(array('_ci_view' => '_common/layout/' . $layout, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
            }
        }
    }

    public function tag($tag, $vars = array())
    {
        if(!empty($vars)) {
            foreach ($vars as $key => $val) {
                $this->vars('_custum_tag_' . $key, $val);
            }
        }

        $tag_file = sprintf('_common/tags/%s_%s', strtolower(str_replace('/', '', $tag)), ($tag[0] == '/' ? 'end' : 'start'));

        if(file_exists(VIEWPATH . $tag_file . '.php')) {
            return $this->_ci_load(array('_ci_view' => $tag_file, '_ci_vars' => null, '_ci_return' => true));
        } else {
            return 'Not define tag (' .  $tag . ')';
        }
    }

    public function get_layout()
    {
        return $this->_layout;
    }

    public function set_layout($layout = 'base')
    {
        $layout = strtolower( $layout);

        $this->_layout = (file_exists(sprintf(VIEWPATH . '_common/layout/%s.php', $layout)) ? $layout : null);
        
        return $this;
    }
    
    public function set_content_type($content_type)
    {
        $this->_content_type = strtolower($content_type);
        
        return $this;
    }

    public function set_js($js)
    {
        $jsfile = (strncmp(strtolower($js), '<script', 7) === 0 ? $js : sprintf('<script type="text/javascript" src="%s"></script>', base_url($js))) . "\n";
        $this->_js[md5($jsfile)] = $jsfile;

        return $this;
    }

    public function set_css($css)
    {
        $cssfile = (strncmp(strtolower($css), '<link', 5) === 0 ? $css : sprintf('<link rel="stylesheet" type="text/css" href="%s"/>', base_url($css))) . "\n";
        $this->_css[md5($cssfile)] = $cssfile;

        return $this;
    }
}