<?php

/**
 * Created by IntelliJ IDEA.
 * User: dcg
 * Date: 2017-02-14
 * Time: 오전 11:20
 */
class Ax5mock
{
    public function get_auth_group_menu()
    {
        return array(
            'schAh' => 'N', // 조회
            'savAh' => 'N', // 저장
            'exlAh' => 'N', // 엑셀
            'delAh' => 'N', // 삭제
            'fn1Ah' => 'N', // 기능1
            'fn2Ah' => 'N', // 기능2
            'fn3Ah' => 'N', // 기능3
            'fn4Ah' => 'N', // 기능4
            'fn5Ah' => 'N', // 기능5
        );
    }

    public function get_qCommonCodeFilter() {
        return array(
            'GROUP_CD' => 'groupCd',
            'GROUP_NM' => 'groupNm',
            'CODE' => 'code',
            'NAME' => 'name',
            'SORT' => 'sort'
        );
    }

    public function get_qProgramFilter() {
        return array(
            'PROG_CD' => 'progCd',
            'PROG_NM' => 'progNm',
            'PROG_PH' => 'progPh',
            'TARGET' => 'target',
            'AUTH_CHECK' => 'authCheck',
            'SCH_AH' => 'schAh',
            'SAV_AH' => 'savAh',
            'EXL_AH' => 'exlAh',
            'DEL_AH' => 'delAh',
            'FN1_AH' => 'fn1Ah',
            'FN2_AH' => 'fn2Ah',
            'FN3_AH' => 'fn3Ah',
            'FN4_AH' => 'fn4Ah',
            'FN5_AH' => 'fn5Ah',
            'REMARK' => 'remark'
        );
    }
}