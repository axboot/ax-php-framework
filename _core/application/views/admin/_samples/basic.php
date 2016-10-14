<?=ax('set', array(
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <div role="page-header">
        <?=ax('form', array('name' => "searchView0"))?>
            <?=ax('tbl', array('clazz' => "ax-search-tbl", 'minWidth' => "500px"))?>
                <?=ax('tr')?>
                    <?=ax('td', array('label' => '검색조건', 'width' => "300px"))?>
                        <input type="text" class="form-control" />
                    <?=ax('/td')?>
                    <?=ax('td', array('label' => '검색조건 1', 'width' => "300px"))?>
                        <input type="text" class="form-control" />
                    <?=ax('/td')?>
                    <?=ax('td', array('label' => '검색조건 2', 'width' => "300px"))?>
                        <input type="text" class="form-control" />
                    <?=ax('/td')?>
                <?=ax('/tr')?>
            <?=ax('/tbl')?>
        <?=ax('/form')?>
        <div class="H10"></div>
    </div>

    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "horizontal"))?>
        <?=ax('split-panel', array('width' => "*", 'style' => ""))?>

            <!-- 목록 -->
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2><i class="cqc-list"></i>
                        프로그램 목록 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="delete"><i class="cqc-circle-with-plus"></i> 삭제</button>
                </div>
            </div>
            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>

<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '_sample/js/basic.js')?>"></script>
