<?=ax('set', array(
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('js', '/assets/plugins/prettify/prettify.js')?>
<?=ax('js', '/assets/plugins/prettify/lang-css.js')?>
<?=ax('css', '/assets/plugins/prettify/skins/github.css')?>

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


    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "vertical"))?>
        <?=ax('split-panel', array('width' => "*", 'style' => "padding-right: 10px;"))?>

            <div class="ax-button-group" data-fit-height-aside="left-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        왼쪽 패널 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-left-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                </div>
            </div>

            <div data-fit-height-content="left-view-01" style="height: 300px;border: 1px solid #D8D8D8;background: #fff;">

<pre>
// ax:split-panel 안에 들어가는 컨텐츠를 핏 하게 집어넣기 위한 소스코드 입니다.
&lt;div data-fit-height-aside="left-view-01">&lt;/div>
&lt;div data-fit-height-content="left-view-01">&lt;/div>
&lt;div data-fit-height-aside="left-view-01">&lt;/div>
// [data-fit-height-aside] [data-dit-height-content] 는 속성의 같은 엘리먼트간에 유기적으로 작동합니다
// 엘리먼트들이 속한 부모 엘리먼트의 높이에서. aside항목의 높이들은 뺀 나머지를 content항목으로 계산하여 style.height를 자동으로 결정합니다.
// data-fit-height 속성은 ax5layout 안에 있는 항목에 대해서만 작동 하고 해당 기능의 이벤트는 axboot.init에서 초기화 되어 있습니다.
</pre>

            </div>

            <div class="ax-button-group ax-button-group-bottom" data-fit-height-aside="left-view-01">
                <div class="left">
                    <button type="button" class="btn btn-default" data-left-view-01-btn="add">버튼 FN0</button>
                    <button type="button" class="btn btn-primary" data-left-view-01-btn="add">버튼 FN1</button>
                    <button type="button" class="btn btn-info" data-left-view-01-btn="add">버튼 FN2</button>
                    <button type="button" class="btn btn-success" data-left-view-01-btn="add">버튼 FN3</button>
                    <button type="button" class="btn btn-warning" data-left-view-01-btn="add">버튼 FN3</button>
                    <button type="button" class="btn btn-danger" data-left-view-01-btn="add">버튼 FN3</button>
                </div>
            </div>

        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('width' => "*", 'style' => "padding-left: 10px;"))?>

            <div class="ax-button-group" data-fit-height-aside="right-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        오른쪽 패널 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-right-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                </div>
            </div>

            <div data-fit-height-content="right-view-01" style="height: 300px;border: 1px solid #D8D8D8;background: #fff;">

<pre>
&lt;div data-fit-height-aside="right-view-01">&lt;/div>
&lt;div data-fit-height-content="right-view-01">&lt;/div>
&lt;div data-fit-height-aside="right-view-01">&lt;/div>
</pre>

            </div>

            <div class="ax-button-group ax-button-group-bottom" data-fit-height-aside="right-view-01">
                <div class="right">
                    <button type="button" class="btn btn-default" data-left-view-01-btn="add">버튼 FN0</button>
                    <button type="button" class="btn btn-primary" data-left-view-01-btn="add">버튼 FN1</button>
                    <button type="button" class="btn btn-info" data-left-view-01-btn="add">버튼 FN2</button>
                    <button type="button" class="btn btn-success" data-left-view-01-btn="add">버튼 FN3</button>
                    <button type="button" class="btn btn-warning" data-left-view-01-btn="add">버튼 FN3</button>
                    <button type="button" class="btn btn-danger" data-left-view-01-btn="add">버튼 FN3</button>
                </div>
            </div>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>

<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '_sample/js/page-structure.js')?>"></script>
