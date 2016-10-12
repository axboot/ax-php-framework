<?php

class Common_code_m extends CI_Model
{
    protected $common_code_m;

    public function __construct()
    {
        parent::__construct();

        $this->common_code_m = new Tblmapper('COMMON_CODE_M');
    }

    public function get($groupCd)
    {
        // select * from COMMON_CODE_M where group_cd = 'MENU_GROUP' and USE_YN = 'Y'
        return $this->common_code_m
            ->select('GROUP_CD as groupCd', false)
            ->select('GROUP_NM as groupNm', false)
            ->select('CODE as code', false)
            ->select('NAME as name', false)
            ->select('SORT as sort', false)
            ->where('GROUP_CD', $groupCd)
            ->where('USE_YN', 'Y')
            ->get();
    }
}
