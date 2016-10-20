<?php

class V1_m extends Api_Model
{
    protected $qCommonCodeFilter;
    protected $qProgramFilter;

    public function __construct()
    {
        parent::__construct();

        $this->qCommonCodeFilter = array(
            'GROUP_CD' => 'groupCd',
            'GROUP_NM' => 'groupNm',
            'CODE' => 'code',
            'NAME' => 'name',
            'SORT' => 'sort'
        );

        $this->qProgramFilter = array(
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

    public function rest_get_commonCodes()
    {
        $groupCd = $this->input->get('groupCd'); // 분류 코드
        $useYn = $this->input->get('useYn'); // 사용여부 (Y/N)
        $filter = $this->input->get('filter'); // 검색어

        $qCommonCode = new Tblmapper('COMMON_CODE_M');
        $qCommonCode->set_filter_column($this->qCommonCodeFilter);

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

        $this->set_res(array(
            'page' => $data['page'],
            'list' => $data['data']
        ));
    }

    public function rest_put_commonCodes()
    {
        $qCommonCode = new Tblmapper('COMMON_CODE_M');

        ax_cud($qCommonCode->set_filter_column($this->qCommonCodeFilter), $this->get_req());
    }

    public function rest_get_programs()
    {
        $filter = $this->input->get('filter'); // 검색어

        $qProgram = new Tblmapper('PROG_M');
        $qProgram->set_filter_column($this->qProgramFilter);

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

        $this->set_res(array(
            'page' => $data['page'],
            'list' => $data['data']
        ));
    }

    public function rest_put_programs()
    {
        $qProgram = new Tblmapper('PROG_M');

        $put_data = $this->get_req();

        if(!empty($put_data)) {
            foreach($put_data as $idx => $row) {
                $put_data[$idx]['progCd'] = md5($row['progPh']);
            }
        }

        // Api cud 함수 호출
        ax_cud($qProgram->set_filter_column($this->qProgramFilter), $put_data);
    }

    public function rest_get_users()
    {
        // Test용 샘플 데이터
        //http://ax5sample.dev/api/v1/users?userCd=system
        if($this->input->get('userCd')) {
            $this->set_res(json_decode('{"userCd":"system","createdAt":"2016-10-03T07:35:59.231Z","createdBy":"system","updatedAt":"2016-10-11T16:51:22.915Z","updatedBy":"system","userNm":"시스템 관리자","userPs":"$2a$11$ruVkoieCPghNOA6mtKzWReZ5Ee66hbeqwvlBT1z.W4VMYckBld6uC","lastLoginDate":"2016-10-11T16:51:22.912Z","userStatus":"NORMAL","ip":"119.35.78.48","locale":"ko_KR","menuGrpCd":"SYSTEM_MANAGER","useYn":"Y","delYn":"N","roleList":[{"createdAt":"2016-10-03T07:35:59.890Z","createdBy":"system","updatedAt":"2016-10-03T07:35:59.890Z","updatedBy":"system","id":1,"userCd":"system","roleCd":"ASP_ACCESS","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":"2016-10-03T07:35:59.945Z","createdBy":"system","updatedAt":"2016-10-03T07:35:59.945Z","updatedBy":"system","id":2,"userCd":"system","roleCd":"SYSTEM_MANAGER","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":"2016-10-06T02:26:37.028Z","createdBy":"system","updatedAt":"2016-10-06T02:26:37.028Z","updatedBy":"system","id":3,"userCd":"system","roleCd":"ASP_ACCESS","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"createdAt":"2016-10-06T02:26:37.035Z","createdBy":"system","updatedAt":"2016-10-06T02:26:37.035Z","updatedBy":"system","id":4,"userCd":"system","roleCd":"SYSTEM_MANAGER","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"authList":[{"createdAt":"2016-10-03T07:35:59.967Z","createdBy":"system","updatedAt":"2016-10-03T07:35:59.967Z","updatedBy":"system","id":1,"userCd":"system","grpAuthCd":"S0001","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}],"id":"system","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}', true));
        } else {
            $this->set_res(json_decode('{"page":{"totalPages":0,"totalElements":0,"currentPage":0,"pageSize":0},"list":[{"userCd":"system","createdAt":"2016-10-03T07:35:59.231Z","createdBy":"system","updatedAt":"2016-10-11T16:51:22.915Z","updatedBy":"system","userNm":"시스템 관리자","userPs":"$2a$11$ruVkoieCPghNOA6mtKzWReZ5Ee66hbeqwvlBT1z.W4VMYckBld6uC","lastLoginDate":"2016-10-11T16:51:22.912Z","userStatus":"NORMAL","ip":"119.35.78.48","locale":"ko_KR","menuGrpCd":"SYSTEM_MANAGER","useYn":"Y","delYn":"N","id":"system","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"userCd":"jang","createdAt":"2016-10-06T02:26:37.006Z","createdBy":"system","updatedAt":"2016-10-06T02:26:37.006Z","updatedBy":"system","userNm":"장우진","userPs":"$2a$11$HjFuL6gEPCLTo9Y4YaRlcuSDhb2V/8W90NFohuGeiWgUZ4MzqNmue","email":"jang@1234.com","passwordUpdateDate":"2016-10-06T02:26:37.004Z","userStatus":"NORMAL","menuGrpCd":"SYSTEM_MANAGER","useYn":"Y","delYn":"N","id":"jang","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}]}', true));
        }
    }

    public function rest_get_errorLogs()
    {
        $this->set_res(json_decode('{"page":{"totalPages":1,"totalElements":9,"currentPage":0,"pageSize":20}}', true));
        $this->set_res(json_decode('{"list":[{"id":9,"phase":"alpha","system":"AXBOOT","loggerName":"org.apache.catalina.core.ContainerBase.[Catalina].[localhost].[/].[dispatcherServlet]","serverName":"localhost","hostName":"chequer","message":"Servlet.service() for servlet [dispatcherServlet] in context with path [] threw exception","trace":"at com.chequer.axboot.core.utils.JsonUtils.fromJson(JsonUtils.java:108)\nat com.chequer.axboot.core.utils.RequestUtils.getRequestBodyJson(RequestUtils.java:214)\nat com.chequer.axboot.admin.filters.LogbackMdcFilter.doFilter(LogbackMdcFilter.java:26)\nat org.springframework.security.web.FilterChainProxy$VirtualFilterChain.doFilter(FilterChainProxy.java:331)\nat org.springframework.security.web.authentication.AbstractAuthenticationProcessingFilter.doFilter(AbstractAuthenticationProcessingFilter.java:200)\nat org.springframework.security.web.FilterChainProxy$VirtualFilterChain.doFilter(FilterChainProxy.java:331)\nat com.chequer.axboot.admin.security.AdminAuthenticationFilter.doFilter(AdminAuthenticationFilter.java:33)\nat org.springframework.security.web.FilterChainProxy$VirtualFilterChain.doFilter(FilterChainProxy.java:331)\nat org.springframework.security.web.authentication.AbstractAuthenticationProcessingFilter.doFilter(AbstractAuthenticationProcessingFilter.java:200)\nat org.springframework.security.web.FilterChainProxy$VirtualFilterChain.doFilter(FilterChainProxy.java:331)\nat org.springframework.security.web.authentication.logout.LogoutFilter.doFilter(LogoutFilter.java:121)\nat org.springframework.security.web.FilterChainProxy$VirtualFilterChain.doFilter(FilterChainProxy.java:331)\nat org.springframework.security.web.FilterChainProxy.doFilterInternal(FilterChainProxy.java:214)\nat org.springframework.security.web.FilterChainProxy.doFilter(FilterChainProxy.java:177)\nat org.springframework.web.filter.DelegatingFilterProxy.invokeDelegate(DelegatingFilterProxy.java:346)\nat org.springframework.web.filter.DelegatingFilterProxy.doFilter(DelegatingFilterProxy.java:262)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat org.springframework.web.filter.RequestContextFilter.doFilterInternal(RequestContextFilter.java:99)\nat org.springframework.web.filter.OncePerRequestFilter.doFilter(OncePerRequestFilter.java:107)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat org.springframework.web.filter.HttpPutFormContentFilter.doFilterInternal(HttpPutFormContentFilter.java:87)\nat org.springframework.web.filter.OncePerRequestFilter.doFilter(OncePerRequestFilter.java:107)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat org.springframework.web.filter.HiddenHttpMethodFilter.doFilterInternal(HiddenHttpMethodFilter.java:77)\nat org.springframework.web.filter.OncePerRequestFilter.doFilter(OncePerRequestFilter.java:107)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat org.springframework.web.filter.CharacterEncodingFilter.doFilterInternal(CharacterEncodingFilter.java:197)\nat org.springframework.web.filter.OncePerRequestFilter.doFilter(OncePerRequestFilter.java:107)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat com.chequer.axboot.core.filters.MultiReadableHttpServletRequestFilter.doFilter(MultiReadableHttpServletRequestFilter.java:15)\nat org.apache.catalina.core.ApplicationFilterChain.internalDoFilter(ApplicationFilterChain.java:239)\nat org.apache.catalina.core.ApplicationFilterChain.doFilter(ApplicationFilterChain.java:206)\nat org.apache.catalina.core.StandardWrapperValve.invoke(StandardWrapperValve.java:212)\nat org.apache.catalina.core.StandardContextValve.invoke(StandardContextValve.java:106)\nat org.apache.catalina.authenticator.AuthenticatorBase.invoke(AuthenticatorBase.java:502)\nat org.apache.catalina.core.StandardHostValve.invoke(StandardHostValve.java:141)\nat org.apache.catalina.valves.ErrorReportValve.invoke(ErrorReportValve.java:79)\nat org.apache.catalina.valves.RemoteIpValve.invoke(RemoteIpValve.java:676)\nat org.apache.catalina.core.StandardEngineValve.invoke(StandardEngineValve.java:88)\nat org.apache.catalina.connector.CoyoteAdapter.service(CoyoteAdapter.java:521)\nat org.apache.coyote.http11.AbstractHttp11Processor.process(AbstractHttp11Processor.java:1096)\nat org.apache.coyote.AbstractProtocol$AbstractConnectionHandler.process(AbstractProtocol.java:674)\nat org.apache.tomcat.util.net.NioEndpoint$SocketProcessor.doRun(NioEndpoint.java:1500)\nat org.apache.tomcat.util.net.NioEndpoint$SocketProcessor.run(NioEndpoint.java:1456)\nat java.util.concurrent.ThreadPoolExecutor.runWorker(ThreadPoolExecutor.java:1142)\nat java.util.concurrent.ThreadPoolExecutor$Worker.run(ThreadPoolExecutor.java:617)\nat org.apache.tomcat.util.threads.TaskThread$WrappingRunnable.run(TaskThread.java:61)\nat java.lang.Thread.run(Thread.java:745)\n","errorDatetime":"2016-10-10T13:55:19.507Z","alertYn":"N","headerMap":"{\"content-length\":\"34\",\"accept-language\":\"ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4,und;q=0.2\",\"postman-token\":\"385a47a3-edc9-2d92-d5e4-4503f4e672c2\",\"origin\":\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\",\"host\":\"axboot-admin\",\"connection\":\"close\",\"content-type\":\"text/plain;charset=UTF-8\",\"cache-control\":\"no-cache\",\"accept-encoding\":\"gzip, deflate\",\"user-agent\":\"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36\",\"accept\":\"*/*\"}","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}]}', true));
    }
    
    public function rest_get_manual($id = null)
    {
        if($id) {
            $this->set_res(json_decode('{"createdAt":"2016-10-03T07:38:06.627Z","createdBy":"system","updatedAt":"2016-10-12T06:57:42.663Z","updatedBy":"system","manualId":3,"manualGrpCd":"DEFAULT","manualNm":"주사","parentId":1,"level":1,"sort":0,"children":[],"dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false,"open":false,"name":"주사","id":3}', true));
        } else {
            $this->set_res(json_decode('{"page":{"totalPages":0,"totalElements":0,"currentPage":0,"pageSize":0},"list":[{"manualId":1,"manualGrpCd":"DEFAULT","manualNm":"1장","level":0,"sort":0,"children":[{"manualId":3,"manualGrpCd":"DEFAULT","manualNm":"주사","parentId":1,"level":1,"sort":0,"children":[{"manualId":16,"manualGrpCd":"DEFAULT","manualNm":"새 목차","parentId":3,"level":2,"sort":0,"children":[],"open":true,"name":"새 목차","id":16}],"open":true,"name":"주사","id":3},{"manualId":8,"manualGrpCd":"DEFAULT","manualNm":"약품","parentId":1,"level":1,"sort":1,"children":[],"open":true,"name":"약품","id":8},{"manualId":11,"manualGrpCd":"DEFAULT","manualNm":"1234","parentId":1,"level":1,"sort":2,"children":[],"open":true,"name":"1234","id":11}],"open":true,"name":"1장","id":1},{"manualId":6,"manualGrpCd":"DEFAULT","manualNm":"2장","level":0,"sort":1,"children":[{"manualId":2,"manualGrpCd":"DEFAULT","manualNm":"수술","parentId":6,"level":1,"sort":0,"children":[],"open":true,"name":"수술","id":2},{"manualId":4,"manualGrpCd":"DEFAULT","manualNm":"입원","parentId":6,"level":1,"sort":1,"children":[],"open":true,"name":"입원","id":4},{"manualId":17,"manualGrpCd":"DEFAULT","manualNm":"새 목차","parentId":6,"level":1,"sort":2,"children":[],"open":true,"name":"새 목차","id":17},{"manualId":10,"manualGrpCd":"DEFAULT","manualNm":"퇴원","parentId":6,"level":1,"sort":3,"children":[],"open":true,"name":"퇴원","id":10}],"open":true,"name":"2장","id":6},{"manualId":7,"manualGrpCd":"DEFAULT","manualNm":"3장","level":0,"sort":2,"children":[{"manualId":9,"manualGrpCd":"DEFAULT","manualNm":"새 목차","parentId":7,"level":1,"sort":0,"children":[],"open":true,"name":"새 목차","id":9},{"manualId":5,"manualGrpCd":"DEFAULT","manualNm":"원무","parentId":7,"level":1,"sort":1,"children":[],"open":true,"name":"원무","id":5}],"open":true,"name":"3장","id":7},{"manualId":12,"manualGrpCd":"DEFAULT","manualNm":"새 목차","level":0,"sort":3,"children":[],"open":true,"name":"새 목차","id":12},{"manualId":13,"manualGrpCd":"DEFAULT","manualNm":"새 목차","level":0,"sort":4,"children":[],"open":true,"name":"새 목차","id":13},{"manualId":14,"manualGrpCd":"DEFAULT","manualNm":"새 목차","level":0,"sort":5,"children":[],"open":true,"name":"새 목차","id":14},{"manualId":15,"manualGrpCd":"DEFAULT","manualNm":"새 목차","level":0,"sort":6,"children":[],"open":true,"name":"새 목차","id":15}]}', true));
        }
    }

    // api/v1/samples/parent
    public function rest_get_samples($type = null)
    {
        if($type == 'parent') {
            $this->set_res(json_decode('{"page":{"totalPages":1,"totalElements":4,"currentPage":0,"pageSize":20},"list":[{"key":"ax5ui","value":"ax5.io","etc1":"","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"key":"axboot","value":"axboot.com","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"key":"chequer","value":"chequer.io","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false},{"key":"axisj","value":"axisj.com","etc1":"","etc2":"ko_KR","etc3":"Y","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}]}', true));
        } elseif($type == 'child') {
            $this->set_res(json_decode('{"page":{"totalPages":1,"totalElements":1,"currentPage":0,"pageSize":20},"list":[{"key":"c1","parentKey":"axisj","value":"c1_value","dataStatus":"ORIGIN","__deleted__":false,"__created__":false,"__modified__":false}]}', true));
        }
    }
}