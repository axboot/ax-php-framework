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

    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "horizontal"))?>
        <?=ax('split-panel', array('height' => "250", 'style' => "padding-bottom: 10px;"))?>

            <div class="ax-button-group" data-fit-height-aside="left-view-01">
                <div class="left">
                    <h2>
                        <i class="cqc-list"></i>
                        상단 패널 </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-left-view-01-btn="add"><i class="cqc-circle-with-plus"></i> 추가</button>
                </div>
            </div>

            <div data-fit-height-content="left-view-01" style="height: 300px;border: 1px solid #D8D8D8;background: #fff;">

<pre>
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
        <?=ax('split-panel', array('height' => "*", 'style' => "padding-top: 10px;"))?>

            <?=ax('tab-layout', array('name' => "ax2", 'data_fit_height_content' => "layout-view-01", 'style' => "height:100%;"))?>
                <?=ax('tab-panel', array('label' => "기본정보", 'scroll' => "scroll"))?>
                    <p>
                        기본정보
                    </p>
                <?=ax('/tab-panel')?>
                <?=ax('tab-panel', array('label' => "일반정보", 'scroll' => "scroll", 'active' => "true"))?>

                    <div class="ax-button-group" data-fit-height-aside="right-view-01">
                        <div class="left">
                            <h2>
                                <i class="cqc-list"></i>
                                탭 레이아웃 만들기 </h2>
                        </div>
                    </div>

                    <div data-fit-height-content="right-view-01" style="height: 300px;border: 1px solid #D8D8D8;background: #fff;">

<pre>
// 탭 레이아웃을 손쉽게 태그만으로 만들 수 있습니다.
// ax:tab-layout 태그를 만드세요. name을 반드시 부모 layout과 다르게 설정해야 하는 것을 잊지 마세요.
&lt;ax:tab-layout name="ax2" data_fit_height_content="layout-view-01" style="height:100%;">
    &lt;ax:tab-panel label="기본정보" scroll="scroll">
        &lt;p>
            기본정보
        &lt;/p>
    &lt;/ax:tab-panel>
    &lt;ax:tab-panel label="일반정보" scroll="scroll" active="true"> // active="true"인 패널이 활성화 패널이 됩니다.
        &lt;p>
            일반정보
        &lt;/p>
    &lt;/ax:tab-panel>
    &lt;ax:tab-panel label="상세정보" scroll="scroll">
        &lt;p>
            상세정보
        &lt;/p>
    &lt;/ax:tab-panel>
    &lt;ax:tab-panel label="기타정보" scroll="scroll">
        &lt;p>
            기타정보
        &lt;/p>
    &lt;/ax:tab-panel>
    &lt;ax:tab-panel label="이력조회" scroll="scroll">
        &lt;p>
            이력조회
        &lt;/p>
    &lt;/ax:tab-panel>
&lt;/ax:tab-layout>

</pre>

                    </div>

                <?=ax('/tab-panel')?>
                <?=ax('tab-panel', array('label' => "상세정보", 'scroll' => "scroll"))?>
                    <p>
                        상세정보
                    </p>
                <?=ax('/tab-panel')?>
                <?=ax('tab-panel', array('label' => "기타정보", 'scroll' => "scroll"))?>
                    <p>
                        기타정보
                    </p>
                <?=ax('/tab-panel')?>
                <?=ax('tab-panel', array('label' => "이력조회", 'scroll' => "scroll"))?>
                    <p>
                        이력조회
                    </p>
                <?=ax('/tab-panel')?>
            <?=ax('/tab-layout')?>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>

<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '_sample/js/page-structure.js')?>"></script>