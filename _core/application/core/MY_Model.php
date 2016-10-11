<?php
/**
 * Description of MY_Model
 *
 * @author ncode
 */
class MY_Model {}

class Api_Model extends CI_Model {
    protected $req;
    protected $res;
    protected $token;
    protected $user_info;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->reset_res();

        // 로그인한 사용자의 정보를 가져온다.
        $this->get_user_info();
    }
    
    
    public function get_req($key = false)
    {
        if($key === false) {
            return $this->req;
        }
        
        return isset($this->req[$key]) ? $this->req[$key] : '';
    }
    
    public function set_req($key, $value = false)
    {
        if(is_array($key)) {
            foreach($key as $k => $v) {
                $this->req[$k] = $v;
            }
        } else {
            $this->req[$key] = $value;
        }
        
        return $this;
    }

    public function get_res($key = false)
    {
        if($key === false) {
            return $this->res;
        }
        
        return isset($this->res[$key]) ? $this->res[$key] : false;
    }
    
    public function set_res($key, $value = false)
    {
        if(is_array($key)) {
            foreach($key as $k => $v) {
                $this->res[$k] = $v;
            }
        } else {
            $this->res[$key] = $value;
        }
        
        return $this;
    }
    
    public function reset_res()
    {
        $this->res = array(
            'response' => 'error',
            'msg' => 'Resource init!',
            'rtime' => time()
        );
        
        return $this;
    }
    
    public function show_response($msg = false)
    {
        if($msg !== false) {
            $this->set_res('msg', $msg);
        }
        
        header('Content-Type: application/json');
        exit(json_encode($this->get_res()));
    }
    
    public function rest_list_item()
    {
        $this->set_res('msg', 'Not define LIST!');
    }
    
    public function rest_get_item($id = false)
    {
        $this->set_res('msg', 'Not define GET!');
    }
    
    public function rest_post_item()
    {
        $this->set_res('msg', 'Not define POST!');
    }
    
    public function rest_put_item($id = false)
    {
        $this->set_res('msg', 'Not define PUT!');
    }

    public function rest_delete_item($id = false)
    {
        $this->set_res('msg', 'Not define DELETE!');
    }
    
    public function get_token()
    {
        if($this->token) {
            return $this->token;
        }
        
        if(function_exists('getallheaders')) {
            foreach(getallheaders() as $name => $value) {
                if(ucwords($name) == 'Authorization') {
                    return $value;
                }
            }
        }
        
        foreach($_SERVER as $name => $value) 
        { 
            if(substr($name, 0, 5) == 'HTTP_') {
                if(str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5))))) == 'Authorization') {
                    return $value;
                }
            }
        }
    }
    
    public function set_token($token)
    {
        $this->token = $token;
        
        return $this;
    }
    
    public function validation_token()
    {
        if(isset($this->user_info['id']) && $this->user_info['id'] > 0) {
            return $this->is_withdraw() === false ? true : false;
        }

        $this->set_res('msg', '잘못된 인증토큰 입니다.');
        return false;
    }

    public function get_user_info()
    {
        $tok = explode(' ', $this->get_token());

        if(isset($tok[0]) && isset($tok[1]) && $tok[0] == 'bearer') {
            if (isset($tok[0]) && isset($tok[1]) && $tok[0] == 'bearer') {
                $this->user_info = jwt_decode($tok[1], true);

                if (isset($this->user_info['id']) && $this->user_info['id'] > 0) {
                    /**
                     * @todo 토큰별 시간 점검 로직 추가
                     * $this->user_info['iat'] 값으로 확인 가능
                     */
                    return true;
                }
            }
        }

        return false;
    }

    public function get_user_id()
    {
        return isset($this->user_info['id']) && $this->user_info['id'] > 0 ? $this->user_info['id'] : false;
    }

    public function is_withdraw($user_id = null)
    {
        $ret = -1;
        $user_id = $user_id == null ? $this->user_info['id'] : $user_id;

        if(intval($user_id) > 0) {
            $user = new Tblmapper('user');
            $row = $user->select('withdraw')->where('id', $user_id)->get_one();

            $ret = isset($row['withdraw']) ? $row['withdraw'] : -1;
        }

        return $ret;
    }
}

class Mapi_Model extends Api_Model {
    public function __construct()
    {
        parent::__construct();
        
        if($this->validation_token() == false) {
            $this->show_response();
        }
    }
}