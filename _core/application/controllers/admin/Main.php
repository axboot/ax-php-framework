<?php

class Main extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->main();
    }

    public function main()
    {
        /**
         * @todo
         * DB 모델을 통하여 데이터 설정 필요함
         * - menuJson(메뉴 데이터) 설정
         * - commonCodeJson(공유 데이터) 설정
         * - scriptSession(로그인세션 데이터) 설정
         */


        // 테스트 데이터 시작
        ax('set', array('menuJson' => '[{"createdAt":1475480160.071000000,"createdBy":"system","updatedAt":1475998173.380000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":1,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"시스템관리","parentId":null,"level":0,"sort":0,"progCd":null,"children":[{"createdAt":1475480160.134000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":2,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"공통코드 관리","parentId":1,"level":1,"sort":0,"progCd":"system-config-common-code","children":[],"program":{"createdAt":1475480160.038000000,"createdBy":"system","updatedAt":1475480160.915000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-config-common-code","progNm":"공통코드관리","progPh":"/admin/system/system-config-common-code","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"Y","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-config-common-code","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"공통코드 관리","id":2},{"createdAt":1475480160.141000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":3,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"프로그램 관리","parentId":1,"level":1,"sort":1,"progCd":"system-config-program","children":[],"program":{"createdAt":1475480160.042000000,"createdBy":"system","updatedAt":1475480160.917000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-config-program","progNm":"프로그램관리","progPh":"/admin/system/system-config-program","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-config-program","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"프로그램 관리","id":3},{"createdAt":1475480160.146000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":4,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"메뉴관리","parentId":1,"level":1,"sort":2,"progCd":"system-config-menu","children":[],"program":{"createdAt":1475480160.040000000,"createdBy":"system","updatedAt":1475480160.916000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-config-menu","progNm":"메뉴관리","progPh":"/admin/system/system-config-menu","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-config-menu","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"메뉴관리","id":4},{"createdAt":1475480160.152000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":5,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"사용자 관리","parentId":1,"level":1,"sort":3,"progCd":"system-auth-user","children":[],"program":{"createdAt":1475480160.035000000,"createdBy":"system","updatedAt":1475480160.915000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-auth-user","progNm":"사용자관리","progPh":"/admin/system/system-auth-user","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-auth-user","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"사용자 관리","id":5},{"createdAt":1475480160.159000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":6,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"에러로그 조회","parentId":1,"level":1,"sort":4,"progCd":"system-operation-log","children":[],"program":{"createdAt":1475480160.048000000,"createdBy":"system","updatedAt":1475480160.918000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-operation-log","progNm":"에러로그 조회","progPh":"/admin/system/system-operation-log","target":"_self","authCheck":"Y","schAh":"Y","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"Y","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-operation-log","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"에러로그 조회","id":6},{"createdAt":1475480160.170000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":7,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"매뉴얼 관리","parentId":1,"level":1,"sort":5,"progCd":"system-help-manual","children":[],"program":{"createdAt":1475480160.044000000,"createdBy":"system","updatedAt":1475480160.917000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"system-help-manual","progNm":"매뉴얼 관리","progPh":"/admin/system/system-help-manual","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":"N","delAh":"N","fn1Ah":"Y","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"system-help-manual","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"매뉴얼 관리","id":7}],"program":null,"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"시스템관리","id":1},{"createdAt":1475480160.176000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":8,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"레이아웃 샘플","parentId":null,"level":0,"sort":1,"progCd":null,"children":[{"createdAt":1475480160.188000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":10,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"페이지구조설명","parentId":8,"level":1,"sort":0,"progCd":"page-structure","children":[],"program":{"createdAt":1475480160.029000000,"createdBy":"system","updatedAt":1475480160.915000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"page-structure","progNm":"[샘플]페이지구조","progPh":"/admin/_samples/page-structure","target":"_self","authCheck":"N","schAh":null,"savAh":null,"exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"page-structure","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"페이지구조설명","id":10},{"createdAt":1475480160.191000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":11,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"좌우레이아웃","parentId":8,"level":1,"sort":1,"progCd":"vertical-layout","children":[],"program":{"createdAt":1475480160.052000000,"createdBy":"system","updatedAt":1475480160.918000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"vertical-layout","progNm":"[샘플]좌우레이아웃","progPh":"/admin/_samples/vertical-layout","target":"_self","authCheck":"N","schAh":null,"savAh":null,"exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"vertical-layout","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"좌우레이아웃","id":11},{"createdAt":1475480160.197000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":12,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"상하레이아웃","parentId":8,"level":1,"sort":2,"progCd":"page-structure","children":[],"program":{"createdAt":1475480160.029000000,"createdBy":"system","updatedAt":1475480160.915000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"page-structure","progNm":"[샘플]페이지구조","progPh":"/admin/_samples/page-structure","target":"_self","authCheck":"N","schAh":null,"savAh":null,"exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"page-structure","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"상하레이아웃","id":12},{"createdAt":1475480160.218000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":17,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"탭레이아웃","parentId":8,"level":1,"sort":3,"progCd":"tab-layout","children":[],"program":{"createdAt":1475480160.050000000,"createdBy":"system","updatedAt":1475480160.918000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"tab-layout","progNm":"[샘플]탭레이아웃","progPh":"/admin/_samples/tab-layout","target":"_self","authCheck":"N","schAh":null,"savAh":null,"exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"tab-layout","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"탭레이아웃","id":17},{"createdAt":1475480160.206000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":13,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"기본템플릿","parentId":8,"level":1,"sort":4,"progCd":"basic","children":[],"program":{"createdAt":1475480160.000000000,"createdBy":"system","updatedAt":1475480160.914000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"basic","progNm":"[샘플]기본템플릿","progPh":"/admin/_samples/basic","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"basic","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"기본템플릿","id":13},{"createdAt":1475480160.209000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":14,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&폼 템플릿","parentId":8,"level":1,"sort":5,"progCd":"grid-form","children":[],"program":{"createdAt":1475480160.005000000,"createdBy":"system","updatedAt":1475480160.914000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"grid-form","progNm":"[샘플]그리드&폼 템플릿","progPh":"/admin/_samples/grid-form","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"grid-form","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"그리드&폼 템플릿","id":14},{"createdAt":1475480160.212000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":15,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&탭폼 템플릿","parentId":8,"level":1,"sort":6,"progCd":"grid-tabform","children":[],"program":{"createdAt":1475480160.008000000,"createdBy":"system","updatedAt":1475480160.914000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"grid-tabform","progNm":"[샘플]그리드&탭폼 템플릿","progPh":"/admin/_samples/grid-tabform","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"grid-tabform","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"그리드&탭폼 템플릿","id":15},{"createdAt":1475480160.215000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":16,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"그리드&모달 템플릿","parentId":8,"level":1,"sort":7,"progCd":"grid-modal","children":[],"program":{"createdAt":1475480160.006000000,"createdBy":"system","updatedAt":1475480160.914000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"grid-modal","progNm":"[샘플]모달 템플릿","progPh":"/admin/_samples/grid-modal","target":"_self","authCheck":"Y","schAh":"Y","savAh":"Y","exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"grid-modal","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"그리드&모달 템플릿","id":16}],"program":null,"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"레이아웃 샘플","id":8},{"createdAt":1475480160.179000000,"createdBy":"system","updatedAt":1475998173.381000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":9,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"API","parentId":null,"level":0,"sort":2,"progCd":null,"children":[{"createdAt":1475480160.221000000,"createdBy":"system","updatedAt":1475998173.382000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":18,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"AXBOOT.js","parentId":9,"level":1,"sort":0,"progCd":"axboot-js","children":[],"program":{"createdAt":1475480159.995000000,"createdBy":"system","updatedAt":1475480160.914000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"axboot-js","progNm":"[API]axboot.js","progPh":"/admin/_apis/axboot-js","target":"_self","authCheck":"N","schAh":null,"savAh":null,"exlAh":null,"delAh":null,"fn1Ah":null,"fn2Ah":null,"fn3Ah":null,"fn4Ah":null,"fn5Ah":null,"remark":null,"id":"axboot-js","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"AXBOOT.js","id":18},{"createdAt":1475480160.223000000,"createdBy":"system","updatedAt":1475998173.382000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":19,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"ax-phase-auth","parentId":9,"level":1,"sort":1,"progCd":"ax-phase-auth","children":[],"program":{"createdAt":1475998122.884000000,"createdBy":"system","updatedAt":1475998122.884000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"ax-phase-auth","progNm":"[API]ax:phase&ax:auth","progPh":"/admin/_apis/ax-phase-auth","target":"_self","authCheck":"N","schAh":"N","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"ax-phase-auth","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"ax-phase-auth","id":19},{"createdAt":1475480160.226000000,"createdBy":"system","updatedAt":1475998173.382000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"menuId":20,"menuGrpCd":"SYSTEM_MANAGER","menuNm":"폼사용법","parentId":9,"level":1,"sort":2,"progCd":"form-example","children":[],"program":{"createdAt":1475998122.875000000,"createdBy":"system","updatedAt":1475998122.875000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"progCd":"form-example","progNm":"[API]폼 상세설명","progPh":"/admin/_apis/form-example","target":"_self","authCheck":"N","schAh":"N","savAh":"N","exlAh":"N","delAh":"N","fn1Ah":"N","fn2Ah":"N","fn3Ah":"N","fn4Ah":"N","fn5Ah":"N","remark":null,"id":"form-example","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"폼사용법","id":20}],"program":null,"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"API","id":9}]'));
        ax('set', array('commonCodeJson' => '{"DEL_YN":[{"createdAt":1475480160.843000000,"createdBy":"system","updatedAt":1475480160.843000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"DEL_YN","groupNm":"삭제여부","code":"N","name":"미삭제","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"DEL_YN","code":"N"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.867000000,"createdBy":"system","updatedAt":1475480160.867000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"DEL_YN","groupNm":"삭제여부","code":"Y","name":"삭제","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"DEL_YN","code":"Y"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"USE_YN":[{"createdAt":1475480160.869000000,"createdBy":"system","updatedAt":1475720834.332000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USE_YN","groupNm":"사용여부","code":"Y","name":"사용","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USE_YN","code":"Y"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.844000000,"createdBy":"system","updatedAt":1475480160.844000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USE_YN","groupNm":"사용여부","code":"N","name":"사용안함","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USE_YN","code":"N"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"LOCALE":[{"createdAt":1475480160.832000000,"createdBy":"system","updatedAt":1475480160.832000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"LOCALE","groupNm":"로케일","code":"ko_KR","name":"대한민국","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"LOCALE","code":"ko_KR"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.830000000,"createdBy":"system","updatedAt":1475480160.830000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"LOCALE","groupNm":"로케일","code":"en_US","name":"미국","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"LOCALE","code":"en_US"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"USER_STATUS":[{"createdAt":1475480160.846000000,"createdBy":"system","updatedAt":1475480160.846000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_STATUS","groupNm":"계정상태","code":"NORMAL","name":"활성","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_STATUS","code":"NORMAL"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.799000000,"createdBy":"system","updatedAt":1475480160.799000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_STATUS","groupNm":"계정상태","code":"ACCOUNT_LOCK","name":"잠김","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_STATUS","code":"ACCOUNT_LOCK"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"AUTH_GROUP":[{"createdAt":1475480160.851000000,"createdBy":"system","updatedAt":1475480160.851000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"AUTH_GROUP","groupNm":"권한그룹","code":"S0001","name":"시스템관리자 그룹","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"AUTH_GROUP","code":"S0001"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.853000000,"createdBy":"system","updatedAt":1475480160.853000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"AUTH_GROUP","groupNm":"권한그룹","code":"S0002","name":"사용자 권한그룹","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"AUTH_GROUP","code":"S0002"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475720830.205000000,"createdBy":"system","updatedAt":1475720830.205000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"AUTH_GROUP","groupNm":"권한그룹","code":"S0003","name":"매뉴얼 관리자 그룹","sort":3,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"AUTH_GROUP","code":"S0003"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"USER_ROLE":[{"createdAt":1475480160.815000000,"createdBy":"system","updatedAt":1475480160.815000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_ROLE","groupNm":"사용자 롤","code":"ASP_ACCESS","name":"관리시스템 접근 롤","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_ROLE","code":"ASP_ACCESS"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.863000000,"createdBy":"system","updatedAt":1475480160.863000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_ROLE","groupNm":"사용자 롤","code":"SYSTEM_MANAGER","name":"시스템 관리자 롤","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_ROLE","code":"SYSTEM_MANAGER"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.820000000,"createdBy":"system","updatedAt":1475480160.820000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_ROLE","groupNm":"사용자 롤","code":"ASP_MANAGER","name":"일반괸리자 롤","sort":3,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_ROLE","code":"ASP_MANAGER"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.801000000,"createdBy":"system","updatedAt":1475480160.801000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"USER_ROLE","groupNm":"사용자 롤","code":"API","name":"API 접근 롤","sort":6,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"USER_ROLE","code":"API"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"MANUAL_GROUP":[{"createdAt":1475480160.826000000,"createdBy":"system","updatedAt":1475480160.826000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"MANUAL_GROUP","groupNm":"메뉴얼 그룹","code":"DEFAULT","name":"기본그룹","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"MANUAL_GROUP","code":"DEFAULT"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"MENU_GROUP":[{"createdAt":1475480160.855000000,"createdBy":"system","updatedAt":1475480160.855000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"MENU_GROUP","groupNm":"메뉴그룹","code":"SYSTEM_MANAGER","name":"시스템 관리자 그룹","sort":1,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"MENU_GROUP","code":"SYSTEM_MANAGER"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":1475480160.865000000,"createdBy":"system","updatedAt":1475480160.865000000,"updatedBy":"system","createdUser":null,"modifiedUser":null,"groupCd":"MENU_GROUP","groupNm":"메뉴그룹","code":"USER","name":"사용자 그룹","sort":2,"data1":null,"data2":null,"data3":null,"data4":null,"data5":null,"remark":null,"useYn":"Y","id":{"groupCd":"MENU_GROUP","code":"USER"},"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}]}'));
        ax('set', array('scriptSession', '{"userCd":"system","userNm":"시스템 관리자","compCd":null,"storCd":null,"locale":"ko_KR","timeZone":"ROK","dateFormat":"YYYY-MM-DD","login":true,"dateTimeFormat":"YYYY-MM-DD HH:mm:ss","timeFormat":"HH:mm:ss"}'));
        // 테스트 데이터 끝

        $this->load->view('admin/main/main');
    }
}