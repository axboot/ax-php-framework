<?php defined('AX_PHP_BOOT') OR exit('No direct script access allowed');
// Timezone 설정
date_default_timezone_set('Asia/Seoul');

if (PHP_SAPI === 'cli' OR defined('STDIN')) {
    // Command Line Env
    $_SERVER['SERVER_NAME'] = PHP_OS . '.cli';

    if (PHP_OS == 'Linux') {
        $axServerList = array(
            // 테스트 서버 CLI 설정
            $_SERVER['SERVER_NAME'] => array(
                'env' => 'development',
                'baseurl' => 'http://ax5-hoksi.cloud.or.kr',
                'index_page' => '',
                'db' => array(
                    'hostname' => getenv('OPENSHIFT_MYSQL_DB_HOST'),
                    'username' => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
                    'database' => 'ax5',
                    'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
                    'dbdriver' => 'mysqli'
                )
            )
        );
    } else {
        $axServerList = array(
            // 그외 기타 개발환경 CLI 설정
            $_SERVER['SERVER_NAME'] => array(
                'env' => 'development',
                'baseurl' => 'http://ax5sample.dev',
                'index_page' => '',
                'db' => array(
                    'hostname' => 'localhost:3308',
                    'username' => 'ax5',
                    'database' => 'ax5',
                    'password' => 'LozAfu3EJELO',
                    'dbdriver' => 'mysqli'
                )
            )
        );
    }
} else {
    $axServerList = array(
        'axphp-hoksi.c9users.io' => array(
            'env' => 'development',
            'baseurl' => 'https://axphp-hoksi.c9users.io',
            'index_page' => '',
            'db' => array(
                'hostname' => getenv('IP'),
                'username' => getenv('C9_USER'),
                'database' => 'c9',
                'password' => getenv('C9_USER_MYSQL_PW'),
                'dbdriver' => 'mysqli'
            )
        )
    );
}


// $axServerList[$_SERVER['HTTP_HOST']] 값 유무에 따라 Production 환경 설정
if(isset($axServerList[$_SERVER['HTTP_HOST']]['env'])) {
    define('ENVIRONMENT', $axServerList[$_SERVER['HTTP_HOST']]['env']);
} else {
    define('ENVIRONMENT', 'production');
}

// BASEURL
if(isset($axServerList[$_SERVER['HTTP_HOST']]['baseurl'])) {
    define('AXBASEURL', $axServerList[$_SERVER['HTTP_HOST']]['baseurl']);
} else {
    $http_protocol = (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')) ? "https://" : "http://");
    define('AXBASEURL',  $http_protocol  . $_SERVER['HTTP_HOST']);
}

// index.php
define('AXINDEXPAGE', isset($axServerList[$_SERVER['HTTP_HOST']]['index_page']) ? $axServerList[$_SERVER['HTTP_HOST']]['index_page'] : 'index.php');

// DB 설정
define('AXDBDRIVER', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['dbdriver']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['dbdriver'] : 'mysqli');
define('AXDBHOST', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['hostname']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['hostname'] : 'localhost');
define('AXDATABASE', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['database']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['database'] : '');
define('AXDBUSER', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['username']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['username'] : '');
define('AXDBPASSWORD', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['password']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['password'] : '');