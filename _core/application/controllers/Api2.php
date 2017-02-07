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
        if (is_object($this->_api_model_)) {

            // 로거 초기화
//            $this->logger
//                ->setLevel(Logger_model::ALL)
//                ->setMethod($method)
//                ->setLogId($this->_insert_id);

            // 잘못된 json 객체가 넘어왔을때 예외처리
            if (empty($this->request->body)) {
                $res = [
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_incorrect_json_format'),
                    'result' => null
                ];

                // 로그를 남김
//                $this->logger->setRequest($this->request->body)->setResponse($res)->info('Request NULL');
                $this->response($res);
                return;
            } else {
                // HTTP method별 request data를 모델에 매핑해줌
                if (isset($this->request->body[0])) {
                    $this->_api_model_->setReqData($this->request->body[0]);
                } else {
                    $this->_api_model_->setReqData($this->{$method}());
                }

                $method = 'rest' . ucfirst($method);

                if (method_exists($this->_api_model_, $method)) {
                    $result = call_user_func_array([$this->_api_model_, $method], $arguments);

                    if ($result === FALSE) {
                        if (isset($result) || empty($result)) {
                            //false 이면서, validation_error => 오류가없이, 오류메시지가없다
                            $error_message = (empty($this->_api_model_->errorMessage)) ? "" : $this->_api_model_->errorMessage;
                        }

                        $res = [
                            $this->config->item('rest_status_field_name') => FALSE,
                            $this->config->item('rest_message_field_name') => $this->_api_model_->errorMessage,
                            'result' => null
                        ];
                    } else {
                        $res = [
                            $this->config->item('rest_status_field_name') => TRUE,
                            $this->config->item('rest_message_field_name') => '',
                            'result' => $result
                        ];
                    }

                    $this->logger->setRequest($this->_api_model_->getReqData())->setResponse($res)->info('Request INFO');
                    $this->response($res);
                } else {
                    $res = [
                        $this->config->item('rest_status_field_name') => FALSE,
                        $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unknown_model_method')
                    ];

                    $this->logger->setRequest($this->_api_model_->getReqData())->setResponse($res)->error('Request Method Not exitst!');
                    $this->response($res, self::HTTP_METHOD_NOT_ALLOWED);
                }

                $this->setRequest($this->_api_model_->getReqData());
            }
        } else {
            $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_not_defined_method')
            ], self::HTTP_METHOD_NOT_ALLOWED);
        }
    }
}