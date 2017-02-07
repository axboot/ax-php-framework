<?php defined('AX_PHP_BOOT') OR exit('No direct script access allowed');
// Timezone 설정
date_default_timezone_set('Asia/Seoul');

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