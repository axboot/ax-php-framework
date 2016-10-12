<?=ax('set', array(
    'system-config-menu-version' => '1.0.0',
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <?=ax('page-header' array('minWidth' => '500px', 'label' => '메뉴그룹', 'width' => '300px'))?>
        <?=ax('common-code', array('groupCd' => 'MENU_GROUP', 'id' => 'menuGrpCd'))?>
    <?=ax('/page-header')?>

    <?=ax('split-layout', array('name' => 'ax1', 'oriental' => 'vertical'))?>
        <?=ax('split-panel', array('width' => '300', 'style' => 'padding-right: 10px;'))?>

            <div class="ax-button-group" data-fit-height-aside="tree-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        메뉴 카테고리 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-tree-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                </div>
            </div>

            <div data-z-tree="tree-view-01" data-fit-height-content="tree-view-01" style="height: 300px;" class="ztree"></div>

        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('width' => '*', 'style' => "padding-left: 10px;", 'id' => "split-panel-form"))?>

            <div data-fit-height-aside="form-view-01">
                <div class="ax-button-group">
                    <div class="left">
                        <h2>
                            <i class="cqc-news"></i>
                            메뉴 정보 </h2>
                    </div>
                    <div class="right">

                    </div>
                </div>

                <?=ax('form', array('name' => "formView01"))?>
                    <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                        <?=ax('tr')?>
                            <?=ax('td', array('label' => "프로그램코드", 'width' => "100%"))?>
                                <input type="text" data-ax-path="progCd" class="form-control" value="" readonly="readonly"/>
                            <?=ax('/td')?>
                        <?=ax('/tr')?>
                        <?=ax('tr')?>
                            <?=ax('td', array('label' => "프로그램 명", 'width' => "100%"))?>
                                <input type="hidden" data-ax-path="menuId" class="form-control" value=""/>
                                <input type="hidden" data-ax-path="progNm" class="form-control" value=""/>
                                <div class="form-group">
                                    <div data-ax5combobox="progCd" data-ax5combobox-config='{size: "", editable: false, multiple: false}'></div>
                                </div>
                            <?=ax('/td')?>
                        <?=ax('/tr')?>
                    <?=ax('/tbl')?>
                <?=ax('/form')?>

                <div class="H20"></div>
                <!-- 목록 -->
                <div class="ax-button-group">
                    <div class="left">
                        <h2><i class="cqc-list"></i>
                            권한그룹 설정 </h2>
                    </div>
                    <div class="right">

                    </div>
                </div>
            </div>

            <div data-ax5grid="grid-view-01" data-fit-height-content="form-view-01" style="height: 300px;"></div>


        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/system/system-config-menu.js')?>"></script>
