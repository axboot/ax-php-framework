<?=ax('set', array(
    'system-operation-log-version' => '1.0.0',
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'true'
))?>

<?=ax('js', '/assets/plugins/prettify/prettify.js')?>
<?=ax('js', '/assets/plugins/prettify/lang-css.js')?>
<?=ax('css', '/assets/plugins/prettify/skins/github.css')?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <?=ax('page-header' array('minWidth' => '500px', 'label' => '검색', 'width' => '300px'))?>
        <input type="text" name="filter" id="filter" class="form-control" value="" placeholder="검색어를 입력하세요."/>
    <?=ax('/page-header')?>

    <?=ax('split-layout', array('name' => 'ax1', 'oriental' => 'horizontal'))?>
        <?=ax('split-panel', array('height' => '300', 'style' => 'padding-bottom: 10px;'))?>
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2><i class="cqc-list"></i>
                        에러목록
                    </h2>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="remove"><i class="cqc-circle-with-minus"></i> 삭제</button>
                    <button type="button" class="btn btn-default" data-grid-view-01-btn="removeAll"><i class="cqc-circle-with-minus"></i> 전체삭제</button>
                </div>
            </div>
            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>
        <?=ax('/split-panel')?>
        <?=ax('splitter')?><?=ax('/splitter')?>
        <?=ax('split-panel', array('height' => '*', 'style' => 'padding-top: 10px;padding-right: 5px;', 'scroll' => 'scroll'))?>
            <?=ax('form', array('name' => "formView01"))?>
                <div class="ax-button-group">
                    <div class="left">
                        <h2><i class="cqc-classic-computer"></i> Stack Trace</h2>
                    </div>
                </div>

                <div class="form-control for-prettify" style="height:auto;padding: 0;" data-ax-path="trace"></div>

                <div class="ax-button-group">
                    <div class="left">
                        <h3><i class="cqc-info-with-circle"></i> 에러 메시지</h3>
                    </div>
                </div>

                <pre class="form-control for-prettify" style="height:auto;padding: 0;" data-ax-path="message"></pre>

                <div class="ax-button-group">
                    <div class="left">
                        <h3><i class="cqc-info-with-circle"></i> Request 파라미터 정보</h3>
                    </div>
                </div>

                <pre class="form-control for-prettify" style="height:auto;padding: 0;" data-ax-path="parameterMap"></pre>

                <div class="ax-button-group">
                    <div class="left">
                        <h2><i class="cqc-info-with-circle"></i> Request 헤더 정보</h2>
                    </div>
                    <div class="right">
                        <!--<button type="button" class="AXButton" id="ax-form-btn-new"><i class="axi axi-plus-circle"></i> 신규</button>-->
                    </div>
                </div>

                <pre class="form-control for-prettify" style="height:auto;padding: 0;" data-ax-path="headerMap"></pre>

                <div class="ax-button-group">
                    <div class="left">
                        <h2><i class="cqc-info-with-circle"></i> Request 사용자 정보</h2>
                    </div>
                </div>

                <pre class="form-control for-prettify" style="height:auto;padding: 0;" data-ax-path="userInfo"></pre>

            <?=ax('/form')?>
        <?=ax('/split-panel')?>
        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/system/system-operation-log.js')?>"></script>
