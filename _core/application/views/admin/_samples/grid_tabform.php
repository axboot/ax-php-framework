<?=ax('set', array(
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <?=ax('page-header', array('minWidth' => '500px', 'label' => '검색조건', 'width' => '300px'))?>
        <input type="text" class="form-control" />
    <?=ax('/page-header')?>

    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "vertical"))?>
        <?=ax('split-panel', array('width' => "400", 'style' => "padding-right: 10px;"))?>

            <!-- 목록 -->
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2><i class="cqc-list"></i>
                        Parent List </h2>
                </div>
                <div class="right">

                </div>
            </div>
            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>

        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('width' => "*", 'style' => "padding-left: 10px;", 'scroll' => "scroll"))?>

            <?=ax('form', array('name' => "formView01"))?>

                <?=ax('tab-layout', array('name' => "ax2", 'data_fit_height_content' => "layout-view-01", 'style' => "height:100%;"))?>
                    <?=ax('tab-panel', array('label' => "Parent Info", 'scroll' => "scroll", 'active' => "true"))?>
                        <!-- 폼 -->
                        <div class="ax-button-group" role="panel-header">
                            <div class="left">
                                <h2>
                                    <i class="cqc-news"></i>
                                    Parent Info
                                </h2>
                            </div>
                            <div class="right">
                                <button type="button" class="btn btn-default" data-form-view-01-btn="form-clear">
                                    <i class="cqc-erase"></i>
                                    <lang data-id="신규"></lang>
                                </button>
                            </div>
                        </div>

                        <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                            <?=ax('tr')?>
                                <?=ax('td', array('label' => "키(KEY) *", 'width' => "300px"))?>
                                    <input type="text" data-ax-path="key" title="키(KEY)" class="form-control" data-ax-validate="required" />
                                <?=ax('/td')?>
                            <?=ax('/tr')?>
                            <?=ax('tr')?>
                                <?=ax('td', array('label' => "값(VALUE)", 'width' => "300px"))?>
                                    <input type="text" data-ax-path="value" class="form-control" />
                                <?=ax('/td')?>
                            <?=ax('/tr')?>
                            <?=ax('tr')?>
                                <?=ax('td', array('label' => "ETC1", 'width' => "300px"))?>
                                    <input type="text" data-ax-path="etc1" class="form-control" />
                                <?=ax('/td')?>
                                <?=ax('td', array('label' => "ETC2", 'width' => "300px"))?>
                                    <select data-ax-path="etc2" class="form-control W100">
                                        <option value="ko_KR">대한민국</option>
                                        <option value="en_US">미국</option>
                                    </select>
                                <?=ax('/td')?>
                            <?=ax('/tr')?>

                            <?=ax('tr')?>
                                <?=ax('td', array('label' => "사용여부", 'width' => "300px"))?>
                                    <select data-ax-path="etc3" class="form-control W100">
    <option value="Y">사용</option>
    <option value="N">사용안함</option>
</select>
                                <?=ax('/td')?>
                                <?=ax('td', array('label' => "계정상태", 'width' => "220px"))?>
                                    <?=ax('common-code', array('groupCd' => "USER_STATUS", 'dataPath' => "userStatus"))?>
                                <?=ax('/td')?>
                            <?=ax('/tr')?>
                        <?=ax('/tbl')?>

                    <?=ax('/tab-panel')?>

                    <?=ax('tab-panel', array('label' => "기본정보"))?>

                        <div class="ax-button-group" data-fit-height-aside="grid-view-02">
                            <div class="left">
                                <h3>
                                    <i class="cqc-list"></i>
                                    Child List</h3>
                            </div>
                            <div class="right">
                                <button type="button" class="btn btn-default" data-grid-view-02-btn="item-add">
                                    <i class="cqc-plus"></i>
                                    추가
                                </button>
                                <button type="button" class="btn btn-default" data-grid-view-02-btn="item-remove">
                                    <i class="cqc-minus"></i>
                                    삭제
                                </button>
                            </div>
                        </div>

                        <div data-ax5grid="grid-view-02" data-fit-height-content="grid-view-02" style="height: 300px;"></div>

                    <?=ax('/tab-panel')?>

                    <?=ax('tab-panel', array('label' => "비고", 'scroll' => "scroll"))?>

                        <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                            <?=ax('tr')?>
                                <ax:td label="비고" width="100%">
                                <?=ax('td', array('label' => "비고", 'width' => "100%"))?>
                                    <textarea data-ax-path="etc4" class="form-control"></textarea>
                                <?=ax('/td')?>
                                </ax:td>
                            <?=ax('/tr')?>
                        <?=ax('/tbl')?>

                    <?=ax('/tab-panel')?>
                <?=ax('/tab-layout')?>

            <?=ax('/form')?>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>

<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '_sample/js/grid-tabform.js')?>"></script>
