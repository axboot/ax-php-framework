<?php

/**
 * Created by IntelliJ IDEA.
 * User: dcg
 * Date: 2017-02-14
 * Time: 오후 1:42
 */
class Programs_m extends RESTAPI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function restGet($id = null)
    {
        $filter = $this->getReqData('filter'); // 검색어

        $qProgram = new Tblmapper('PROG_M');
        $qProgram->set_filter_column($this->ax5mock->get_qProgramFilter());

        if($filter) {
            $qProgram->set_filter($filter);
        }

        $data = $qProgram
            ->order_by('PROG_NM')
            ->get_ax5_page();

        for($i = 0, $row_len = count($data['data']); $i < $row_len; $i++) {
            $data['data'][$i]['id'] = array(
                'progCd' => $data['data'][$i]['progCd']
            );
        }

        return array(
            'page' => $data['page'],
            'list' => $data['data']
        );
    }
}