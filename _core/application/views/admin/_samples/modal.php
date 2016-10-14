<?=ax('set', array(
    'pageName' => 'File Browser',
    'axbody_class' => 'baseStyle',
    'page_auto_height' => 'false'
))?>

<?=ax('layout', 'modal')?>
    <?=ax('set', array('header' => '<h1 class="title"><i class="cqc-browser"></i> 코드 검색</h1>'))?>

    <?=ax('page-buttons')?>
        <button type="button" class="btn btn-default" data-page-btn="close">창닫기</button>
        <button type="button" class="btn btn-info" data-page-btn="search">조회</button>
        <button type="button" class="btn btn-fn1" data-page-btn="choice">선택</button>
    <?=ax('/page-buttons')?>

    <?=ax('page-header', array('minWidth' => '500px', 'label' => '검색조건', 'width' => '300px'))?>
        <input type="text" class="form-control"/>
    <?=ax('/page-header')?>


    <?=ax('split-layout', array('name' => "ax1", 'oriental' => "vertical"))?>
        <?=ax('split-panel', array('width' => "*", 'style' => "padding-right: 0px;"))?>
            <div class="ax-button-group" data-fit-height-aside="grid-view-01">
                <div class="left">
                    <h2><i class="cqc-list"></i>
                        List </h2>
                </div>
                <div class="right">

                </div>
            </div>

            <div data-ax5grid="grid-view-01" data-fit-height-content="grid-view-01" style="height: 300px;"></div>

        <?=ax('/split-panel')?>
    <?=ax('/split-layout')?>
<?=ax('/layout')?>

<script type="text/javascript" src="<?=ax('url', '/_sample/js/modal.js')?>"></script>
