<?php

class V2_m extends Api_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function rest_get_menu($type = null)
    {
        if($type == 'auth') {
            $this->set_res(json_decode('{"list":[{"createdAt":"2016-10-03T07:36:00.880Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.880Z","updatedBy":"system","grpAuthCd":"S0001","menuId":2,"schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":{"grpAuthCd":"S0001","menuId":2},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"program":{"createdAt":"2016-10-03T07:36:00.038Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.915Z","updatedBy":"system","progCd":"system-config-common-code","progNm":"공통코드관리","progPh":"/jsp/system/system-config-common-code.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"Y","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-config-common-code","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}}', true));
            return;
        }

        switch($this->input->get('menuGrpCd')) {
            case 'SYSTEM_MANAGER':
                $this->set_res(json_decode('{"page":{"totalPages":0,"totalElements":0,"currentPage":0,"pageSize":0},"list":[{"createdAt":"2016-10-03T07:36:00.071Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.079Z","updatedBy":"system","menuId":1,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"시스템관리","level":0,"sort":0,"children":[{"createdAt":"2016-10-03T07:36:00.134Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.079Z","updatedBy":"system","menuId":2,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"공통코드 관리","parentId":1,"level":1,"sort":0,"progCd":"system-config-common-code","children":[],"program":{"createdAt":"2016-10-03T07:36:00.038Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.915Z","updatedBy":"system","progCd":"system-config-common-code","progNm":"공통코드관리","progPh":"/jsp/system/system-config-common-code.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"Y","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-config-common-code","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"공통코드 관리","id":2},{"createdAt":"2016-10-03T07:36:00.141Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.079Z","updatedBy":"system","menuId":3,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"프로그램 관리","parentId":1,"level":1,"sort":1,"progCd":"system-config-program","children":[],"program":{"createdAt":"2016-10-03T07:36:00.042Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.917Z","updatedBy":"system","progCd":"system-config-program","progNm":"프로그램관리","progPh":"/jsp/system/system-config-program.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-config-program","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"프로그램 관리","id":3},{"createdAt":"2016-10-03T07:36:00.146Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":4,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"메뉴관리","parentId":1,"level":1,"sort":2,"progCd":"system-config-menu","children":[],"program":{"createdAt":"2016-10-03T07:36:00.040Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.916Z","updatedBy":"system","progCd":"system-config-menu","progNm":"메뉴관리","progPh":"/jsp/system/system-config-menu.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-config-menu","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"메뉴관리","id":4},{"createdAt":"2016-10-03T07:36:00.152Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":5,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"사용자 관리","parentId":1,"level":1,"sort":3,"progCd":"system-auth-user","children":[],"program":{"createdAt":"2016-10-03T07:36:00.035Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.915Z","updatedBy":"system","progCd":"system-auth-user","progNm":"사용자관리","progPh":"/jsp/system/system-auth-user.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-auth-user","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"사용자 관리","id":5},{"createdAt":"2016-10-03T07:36:00.159Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":6,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"에러로그 조회","parentId":1,"level":1,"sort":4,"progCd":"system-operation-log","children":[],"program":{"createdAt":"2016-10-03T07:36:00.048Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.918Z","updatedBy":"system","progCd":"system-operation-log","progNm":"에러로그 조회","progPh":"/jsp/system/system-operation-log.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"Y","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-operation-log","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"에러로그 조회","id":6},{"createdAt":"2016-10-03T07:36:00.170Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":7,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"매뉴얼 관리","parentId":1,"level":1,"sort":5,"progCd":"system-help-manual","children":[],"program":{"createdAt":"2016-10-03T07:36:00.044Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.917Z","updatedBy":"system","progCd":"system-help-manual","progNm":"매뉴얼 관리","progPh":"/jsp/system/system-help-manual.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"Y","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"system-help-manual","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"매뉴얼 관리","id":7}],"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"시스템관리","id":1},{"createdAt":"2016-10-03T07:36:00.176Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.079Z","updatedBy":"system","menuId":8,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"레이아웃 샘플","level":0,"sort":1,"children":[{"createdAt":"2016-10-03T07:36:00.188Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":10,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"페이지구조설명","parentId":8,"level":1,"sort":0,"progCd":"page-structure","children":[],"program":{"createdAt":"2016-10-03T07:36:00.029Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.915Z","updatedBy":"system","progCd":"page-structure","progNm":"[샘플]페이지구조","progPh":"/jsp/_samples/page-structure.jsp","target":"_self","authCheck":"N","id":"page-structure","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"페이지구조설명","id":10},{"createdAt":"2016-10-03T07:36:00.191Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":11,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"좌우레이아웃","parentId":8,"level":1,"sort":1,"progCd":"vertical-layout","children":[],"program":{"createdAt":"2016-10-03T07:36:00.052Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.918Z","updatedBy":"system","progCd":"vertical-layout","progNm":"[샘플]좌우레이아웃","progPh":"/jsp/_samples/vertical-layout.jsp","target":"_self","authCheck":"N","id":"vertical-layout","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"좌우레이아웃","id":11},{"createdAt":"2016-10-03T07:36:00.197Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":12,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"상하레이아웃","parentId":8,"level":1,"sort":2,"progCd":"page-structure","children":[],"program":{"createdAt":"2016-10-03T07:36:00.029Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.915Z","updatedBy":"system","progCd":"page-structure","progNm":"[샘플]페이지구조","progPh":"/jsp/_samples/page-structure.jsp","target":"_self","authCheck":"N","id":"page-structure","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"상하레이아웃","id":12},{"createdAt":"2016-10-03T07:36:00.218Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.080Z","updatedBy":"system","menuId":17,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"탭레이아웃","parentId":8,"level":1,"sort":3,"progCd":"tab-layout","children":[],"program":{"createdAt":"2016-10-03T07:36:00.050Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.918Z","updatedBy":"system","progCd":"tab-layout","progNm":"[샘플]탭레이아웃","progPh":"/jsp/_samples/tab-layout.jsp","target":"_self","authCheck":"N","id":"tab-layout","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"탭레이아웃","id":17},{"createdAt":"2016-10-03T07:36:00.206Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":13,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"기본템플릿","parentId":8,"level":1,"sort":4,"progCd":"basic","children":[],"program":{"createdAt":"2016-10-03T07:36:00Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"basic","progNm":"[샘플]기본템플릿","progPh":"/jsp/_samples/basic.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","id":"basic","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"기본템플릿","id":13},{"createdAt":"2016-10-03T07:36:00.209Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":14,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&폼 템플릿","parentId":8,"level":1,"sort":5,"progCd":"grid-form","children":[],"program":{"createdAt":"2016-10-03T07:36:00.005Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"grid-form","progNm":"[샘플]그리드&폼 템플릿","progPh":"/jsp/_samples/grid-form.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","id":"grid-form","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"그리드&폼 템플릿","id":14},{"createdAt":"2016-10-03T07:36:00.212Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":15,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&탭폼 템플릿","parentId":8,"level":1,"sort":6,"progCd":"grid-tabform","children":[],"program":{"createdAt":"2016-10-03T07:36:00.008Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"grid-tabform","progNm":"[샘플]그리드&탭폼 템플릿","progPh":"/jsp/_samples/grid-tabform.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","id":"grid-tabform","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"그리드&탭폼 템플릿","id":15},{"createdAt":"2016-10-03T07:36:00.215Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":16,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&모달 템플릿","parentId":8,"level":1,"sort":7,"progCd":"grid-modal","children":[],"program":{"createdAt":"2016-10-03T07:36:00.006Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"grid-modal","progNm":"[샘플]모달 템플릿","progPh":"/jsp/_samples/grid-modal.jsp","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","id":"grid-modal","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"그리드&모달 템플릿","id":16},{"createdAt":"2016-10-11T13:44:24.310Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":21,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"샘플테스트","parentId":8,"level":1,"sort":8,"progCd":"axboot-js","children":[],"program":{"createdAt":"2016-10-03T07:35:59.995Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"axboot-js","progNm":"[API]axboot.js","progPh":"/jsp/_apis/axboot-js.jsp","target":"_self","authCheck":"N","id":"axboot-js","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"샘플테스트","id":21}],"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"레이아웃 샘플","id":8},{"createdAt":"2016-10-03T07:36:00.179Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.079Z","updatedBy":"system","menuId":9,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"API","level":0,"sort":2,"children":[{"createdAt":"2016-10-03T07:36:00.221Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":18,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"AXBOOT.js","parentId":9,"level":1,"sort":0,"progCd":"axboot-js","children":[],"program":{"createdAt":"2016-10-03T07:35:59.995Z","createdBy":"system","updatedAt":"2016-10-03T07:36:00.914Z","updatedBy":"system","progCd":"axboot-js","progNm":"[API]axboot.js","progPh":"/jsp/_apis/axboot-js.jsp","target":"_self","authCheck":"N","id":"axboot-js","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"AXBOOT.js","id":18},{"createdAt":"2016-10-03T07:36:00.223Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":19,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"ax-phase-auth","parentId":9,"level":1,"sort":1,"progCd":"ax-phase-auth","children":[],"program":{"createdAt":"2016-10-09T07:28:42.884Z","createdBy":"system","updatedAt":"2016-10-09T07:28:42.884Z","updatedBy":"system","progCd":"ax-phase-auth","progNm":"[API]ax:phase&ax:auth","progPh":"/jsp/_apis/ax-phase-auth.jsp","target":"_self","authCheck":"N","schAh":"N","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"ax-phase-auth","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"ax-phase-auth","id":19},{"createdAt":"2016-10-03T07:36:00.226Z","createdBy":"system","updatedAt":"2016-10-11T13:44:38.081Z","updatedBy":"system","menuId":20,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"폼사용법","parentId":9,"level":1,"sort":2,"progCd":"form-example","children":[],"program":{"createdAt":"2016-10-09T07:28:42.875Z","createdBy":"system","updatedAt":"2016-10-09T07:28:42.875Z","updatedBy":"system","progCd":"form-example","progNm":"[API]폼 상세설명","progPh":"/jsp/_apis/form-example.jsp","target":"_self","authCheck":"N","schAh":"N","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","id":"form-example","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"폼사용법","id":20}],"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":true,"name":"API","id":9}]}', true));
                break;
        }
    }
}