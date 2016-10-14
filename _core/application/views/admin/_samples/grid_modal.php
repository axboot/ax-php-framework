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

            <!-- 폼 -->
            <div class="ax-button-group" role="panel-header">
                <div class="left">
                    <h2><i class="cqc-news"></i>
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

            <?=ax('form', array('name' => "formView01"))?>
                <?=ax('tbl', array('clazz' => "ax-form-tbl", 'minWidth' => "500px"))?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "키(KEY) *", 'width' => "300px"))?>
                            <input type="text" data-ax-path="key" title="키(KEY)" class="form-control" data-ax-validate="required"/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "값(VALUE)", 'width' => "300px"))?>
                            <input type="text" data-ax-path="value" class="form-control"/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "주소찾기", 'width' => "100%"))?>
                            <input type="text" data-ax-path="etc1" class="form-control inline-block W100" readonly="readonly"/>
                            <button class="btn btn-default" data-form-view-01-btn="etc1find"><i class="cqc-magnifier"></i> 찾기</button>
                            <div class="H5"></div>
                            <input type="text" data-ax-path="etc2" class="form-control"/>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                    <?=ax('tr')?>
                        <?=ax('td', array('label' => "코드찾기", 'width' => "100%"))?>
                            <input type="text" data-ax-path="etc3" class="form-control inline-block W60" readonly="readonly" />
                            <input type="text" data-ax-path="etc4" class="form-control inline-block W150"/>
                            <button class="btn btn-default" data-form-view-01-btn="etc3find"><i class="cqc-magnifier"></i> 찾기</button>
                        <?=ax('/td')?>
                    <?=ax('/tr')?>
                <?=ax('/tbl')?>
            <?=ax('/form')?>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '_sample/js/grid-modal.js' )?>"></script>

