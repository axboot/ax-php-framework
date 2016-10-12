<?=ax('set', array(
    'system-help-manual-version' => '1.0.0',
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<script type="text/javascript">var menuId = <?=ax('get', 'menuId')?>;</script>
<?=ax('js', '/assets/plugins/ckeditor/ckeditor.js')?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>
    
    <?=ax('page-header', array('pgMinWidth' => '500px', 'pgLabel' => '매뉴얼 그룹', 'pgWidth' => '300px'))?>
        <?=ax('common-code', array('groupCd' => "MANUAL_GROUP", 'id' => "manualGrpCd"))?>
    <?=ax('/page-header')?>

    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "vertical"))?>
        <?=ax('split-panel', array('width' => '300', 'style' => 'padding-right: 10px;'))?>

            <div class="ax-button-group" data-fit-height-aside="tree-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        목차 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-tree-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                </div>
            </div>

            <div data-z-tree="tree-view-01" data-fit-height-content="tree-view-01" style="height: 300px;" class="ztree"></div>

        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('width' => '*', 'style' => "padding-left: 10px;", 'id' => "split-panel-form"))?>

            <?=ax('form', array('name' => "formView01"))?>
                <div data-fit-height-aside="form-view-01">
                    <div class="ax-button-group">
                        <div class="left">
                            <h2>
                                <i class="cqc-news"></i>
                                매뉴얼 내용 </h2>
                        </div>
                        <div class="right">

                        </div>
                    </div>

                    <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                        <?=ax('tr')?>
                            <?=ax('td', array('label' => "호출 아이디"))?>
                                <input type="hidden" data-ax-path="manualId"/>
                                <input type="text" data-ax-path="manualKey" class="form-control" value=""/>
                            <?=ax('/td')?>
                        <?=ax('/tr')?>
                    <?=ax('/tbl')?>
                </div>
                <div class="H10"></div>
                <textarea data-ax-path="content" id="editor1"></textarea>
                <div data-fit-height-content="form-view-01"></div>
            <?=ax('/form')?>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/system/system-help-manual.js')?>"></script>
