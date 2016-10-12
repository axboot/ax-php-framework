<?=ax('set', array(
    'system-config-program-version' => '1.0.0',
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <?=ax('page-header' array('minWidth' => '500px', 'label' => '검색', 'width' => '300px'))?>
        <input type="text" name="filter" id="filter" class="form-control" value="" placeholder="검색어를 입력하세요."/>
    <?=ax('/page-header')?>

    <?=ax('split-layout', array('name' => 'ax1', 'oriental' => 'horizontal'))?>
        <?=ax('split-panel', array('width' => '*', 'style' => ''))?>
            <!-- 목록 -->
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        프로그램 목록
                    </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="delete"><i class="cqc-circle-with-minus"></i> 삭제</button>
                </div>
            </div>
            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/system/system-config-program.js')?>"></script>