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
        'ax5sample.dev' => array(
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
        ),
        'ax5-hoksi.cloud.or.kr' => array(
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
}


// $axServerList[$_SERVER['HTTP_HOST']] 값 유무에 따라 Production 환경 설정
define('ENVIRONMENT', isset($axServerList[$_SERVER['HTTP_HOST']]['env']) ? $axServerList[$_SERVER['HTTP_HOST']]['env'] : 'production');
define('AXBASEURL', isset($axServerList[$_SERVER['HTTP_HOST']]['baseurl']) ? $axServerList[$_SERVER['HTTP_HOST']]['baseurl'] : 'http://' . $_SERVER['HTTP_HOST']);
define('AXINDEXPAGE', isset($axServerList[$_SERVER['HTTP_HOST']]['index_page']) ? $axServerList[$_SERVER['HTTP_HOST']]['index_page'] : 'index.php');
define('AXDBDRIVER', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['dbdriver']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['dbdriver'] : 'mysqli');
define('AXDBHOST', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['hostname']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['hostname'] : 'localhost');
define('AXDATABASE', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['database']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['database'] : '');
define('AXDBUSER', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['username']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['username'] : '');
define('AXDBPASSWORD', isset($axServerList[$_SERVER['HTTP_HOST']]['db']['password']) ? $axServerList[$_SERVER['HTTP_HOST']]['db']['password'] : '');