<?php
    if(ax('attr', 'labelWidth')) {
        ax('setAttr', array('labelStyle' => ax('attr', 'labelStyle') . ';width:' . ax('attr', 'labelWidth')));
    } elseif(ax('attr', 'trLabelWidth')) {
        ax('setAttr', array('labelStyle' => ax('attr', 'labelStyle') . ';width:' . ax('attr', 'trLabelWidth')));
    }

    if(ax('attr', 'width')) {
        ax('setAttr', array('style' => ax('attr', 'style') . ';width:' . ax('attr', 'width')));
    } elseif(ax('attr', 'trWidth')) {
        ax('setAttr', array('style' => ax('attr', 'style') . ';width:' . ax('attr', 'trWidth')));
    }
?>
<?php if(ax('attr', 'label')): ?>
    <div data-ax-td="<?=ax('attr', 'id')?>" id="<?=ax('attr', 'id')?>" class="<?=ax('attr', 'clazz')?>" style="<?=ax('attr', 'style')?>">
        <div data-ax-td-label="<?=ax('attr', 'id')?>" class="<?=ax('attr', 'labelClazz')?>" style="<?=ax('attr', 'labelStyle')?>"><?=ax('attr', 'label')?></div>
        <div data-ax-td-wrap="">
<?php else: ?>
    <div data-ax-td="<?=ax('attr', 'id')?>" id="<?=ax('attr', 'id')?>" class="<?=ax('attr', 'clazz')?>" style="<?=ax('attr', 'style')?>">
<?php endif; ?>
<?=ax('setAttr', array('id' => '', 'label' => '', 'labelClazz' => '', 'clazz' => '', 'labelStyle' => '', 'style' => '', 'width' => '', 'labelWidth' => ''))?>
