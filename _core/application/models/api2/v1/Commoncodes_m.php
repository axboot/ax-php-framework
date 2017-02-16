<?php

/**
 * Created by IntelliJ IDEA.
 * User: dcg
 * Date: 2017-02-08
 * Time: 오전 10:42
 */
class Commoncodes_m extends RESTAPI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function restGet($id = null)
    {
        $groupCd = $this->getReqData('groupCd'); // 분류 코드
        $useYn = $this->getReqData('useYn'); // 사용여부 (Y/N)
        $filter = $this->getReqData('filter'); // 검색어

        $qCommonCode = new Tblmapper('COMMON_CODE_M');
        $qCommonCode->set_filter_column($this->ax5mock->get_qCommonCodeFilter());

        if($groupCd) {
            $qCommonCode->where('GROUP_CD', $groupCd);
        }

        if($useYn) {
            $qCommonCode->where('USE_YN', $useYn);
        }

        if($filter) {
            $qCommonCode->set_filter($filter);
        }

        $data = $qCommonCode
            ->order_by('GROUP_NM')
            ->order_by('SORT')
            ->get_ax5_page();

        for($i = 0, $row_len = count($data['data']); $i < $row_len; $i++) {
            $data['data'][$i]['id'] = array(
                "groupCd" => $data['data'][$i]['groupCd'],
                "code" => $data['data'][$i]['code'],
            );
        }

        return array(
            'page' => $data['page'],
            'list' => $data['data']
        );
    }

    public function restPut($id = null)
    {
        $qCommonCode = new Tblmapper('COMMON_CODE_M');

        ax_cud($qCommonCode->set_filter_column($this->qCommonCodeFilter), $this->getReqData());
    }
}