<div data-page-buttons="">
    <div class="button-warp">
        <?php if(ax('authGroupMenu', 'schAh') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="search"><i class="axi axi-ion-android-search"></i> 조회</button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'savAh') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="save"><i class="axi axi-save"></i> 저장</button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'exlAh') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="excel"><i class="axi axi-file-excel-o"></i> 엑셀</button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'delAh') == 'Y'):?>
            <button type="button" class="btn btn-fn1" data-page-btn="fn1"><i class="axi axi-minus-circle"></i> 삭제</button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'fn1Ah') == 'Y'):?>
            <button type="button" class="btn btn-fn1" data-page-btn="fn1"><i class="axi axi-minus-circle"></i> <?=ax('get', 'function1Label')?></button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'fn2Ah') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="fn2"><i class="axi axi-plus-circle"></i> <?=ax('get', 'function2Label')?></button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'fn3Ah') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="fn3"><?=ax('get', 'function3Label')?></button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'fn4Ah') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="fn4"><?=ax('get', 'function4Label')?></button>
        <?php endif;?>
        <?php if(ax('authGroupMenu', 'fn5Ah') == 'Y'):?>
            <button type="button" class="btn btn-info" data-page-btn="fn5"><?=ax('get', 'function5Label')?></button>
        <?php endif;?>

