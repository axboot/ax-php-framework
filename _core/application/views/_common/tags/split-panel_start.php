<?php if(ax('attr', '_oriental') == 'vertical'): ?>
    <div data-split-panel='{width: "<?=ax('attr', 'width')?>"}' id="<?=ax('attr', 'id')?>">
        <div style="${style}" class="<?=ax('attr', 'clazz')?>" data-split-panel-wrap="<?=ax('attr', 'scroll')?>">
<?php else: ?>
    <div data-split-panel='{height: "<?=ax('attr', 'height')?>"}' id="<?=ax('attr', 'id')?>" style="<?=ax('attr', 'style')?>" class="<?=ax('attr', 'clazz')?>">
        <div style="<?=ax('attr', 'style')?>" class="<?=ax('attr', 'clazz')?>" data-split-panel-wrap="<?=ax('attr', 'scroll')?>">
<?php endif; ?>
<?=ax('setAttr', array('id' => '', 'width' => '', 'height' => '', 'style' => '', 'clazz' => '', 'scroll' => ''))?>
