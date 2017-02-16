<?php

/**
 * Restful Api 라이브러리를 이용한 API 컨트롤러
 *
 * User: hoksi3k@gmail.com
 * Date: 2017-02-07
 * Time: 오전 10:24
 */
class Api2 extends RESTAPI_Controller
{
    public function __construct($config = 'rest') {
        parent::__construct($config);
//        $this->load->model('logger_model', 'logger');
    }

    /**
     * Rest API Version 1.0
     *
     * @param string $method
     * @param array $arguments
     */
    public function v1($method, $arguments = []) {
        parent::runApiModel($method, $arguments);
    }

    /**
     * Rest API Version 2.0
     *
     * @param string $method
     * @param array $arguments
     */
    public function v2($method, $arguments = []) {
        parent::runApiModel($method, $arguments);
    }
}