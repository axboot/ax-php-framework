<?=ax('set', array(
    'system-auth-user-version' => '1.0.0',
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('layout', 'base')?>

    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <?=ax('page-header')?>
        <input type="text" name="filter" id="filter" class="form-control" value="" placeholder="검색어를 입력하세요."/>
    <?=ax('/page-header')?>


    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "vertical"))?>
        <?=ax('split-panel', array('width' => "40%", 'style' => "padding-right: 10px;"))?>

            <!-- 목록 -->
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2><i class="cqc-list"></i>
                        <lang data-id="사용자정보"></lang>
                    </h2>
                </div>
                <div class="right"></div>
            </div>
            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>

        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('width' => "*", 'style' => "padding-left: 10px;", 'scroll' => "scroll"))?>

            <!-- 폼 -->
            <div class="ax-button-group" role="panel-header">
                <div class="left">
                    <h2><i class="cqc-news"></i>
                        <lang data-id="사용자등록"></lang>
                    </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-form-view-01-btn="form-clear">
                        <i class="cqc-erase"></i>
                        <lang data-id="신규"></lang>
                    </button>
                </div>
            </div>

            <?=ax('form', array('name' => "formView01"))?>
                <input type="hidden" name="act_tp" id="act_tp" value=""/>
                <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "이름",  'width' => "300px"))?>
                            <input type="text" name="userNm" data-ax-path="userNm" maxlength="15" title="이름" class="av-required form-control W120" value=""/>
                        <?=ax('/td')?>
                        <?=ax('td', array('label' => "아이디", 'width' => "220px"))?>
                            <input type="text" name="userCd" data-ax-path="userCd" maxlength="100" title="아이디" class="av-required form-control W150" value=""/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "비밀번호", 'width' => "300px"))?>
                            <input type="password" name="userPs" data-ax-path="userPs" maxlength="128" class="form-control W120" value="" readonly="readonly"/>
                        <?=ax('/td')?>
                        <?=ax('td', array('label' => "비밀번호 확인", 'width' => "360px"))?>
                            <input type="password" name="userPs_chk" data-ax-path="userPs_chk" maxlength="128" class="form-control inline-block W120" value="" readonly="readonly"/>
                            &nbsp;
                            <label>
                                <input type="checkbox" data-ax-path="password_change" name="password_change" value="Y"/>
                                비밀번호 변경
                            </label>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "이메일", 'width' => "300px"))?>
                            <input type="text" name="email" data-ax-path="email" maxlength="50" title="이메일" placeholder="abc@abc.com" class="av-email form-control W180" value=""/>
                        <?=ax('/td')?>
                        <?=ax('td', array('label' => "핸드폰번호", 'width' => "220px"))?>
                            <input type="text" name="hpNo" data-ax-path="hpNo" maxlength="15" placeholder="" class="av-phone form-control W120" data-ax5formatter="phone" value=""/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "국가", 'width' => "300px"))?>
                            <select name="country" data-ax-path="country" class="form-control W100">
                                <option value="ko_KR">대한민국</option>
                                <option value="en_US">미국</option>
                            </select>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "사용여부", 'width' => "300px"))?>
                            <select name="useYn" data-ax-path="useYn" class="form-control W100">
                                <option value="Y">사용</option>
                                <option value="N">사용안함</option>
                            </select>
                        <?=ax('/td')?>
                        <?=ax('td', array('label' => "계정상태", 'width' => "220px"))?>
                            <ax:common-code groupCd="USER_STATUS" dataPath="userStatus"/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "비고", 'width' => "100%"))?>
                            <input type="text" name="remark" data-ax-path="remark" maxlength="100" class="form-control" value=""/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                <?=ax('/tbl')?>

                <div class="H5"></div>
                <div class="ax-button-group sm">
                    <div class="left">
                        <h3>메뉴그룹 선택</h3>
                    </div>
                </div>
                <?=ax('tbl', array('clazz' => "ax-form-tbl"))?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "메뉴그룹", 'width' => "250px"))?>
                            <?=ax('common-code', array('groupCd' => "MENU_GROUP", 'dataPath' => "menuGrpCd"))?>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                <?=ax('/tbl')?>

                <div class="H5"></div>
                <div class="ax-button-group sm">
                    <div class="left">
                        <h3>권한설정</h3>
                    </div>
                </div>
                <?=ax('tbl', array('clazz' => "ax-form-tbl"))?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "권한그룹", 'width' => "100%"))?>
                    <?=ax('/tr')?>
                <?=ax('/tbl')?>

                <div class="H5"></div>
                <div class="ax-button-group sm">
                    <div class="left">
                        <h3>롤 설정</h3>
                    </div>
                </div>

                <div data-ax5grid="grid-view-02" style="height: 300px;"></div>

            <?=ax('form')?>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/system/system-auth-user.js')?>"></script>

