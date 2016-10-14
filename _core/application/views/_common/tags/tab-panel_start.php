<?php
if (ax('attr', 'active') == '') {
    ax('setAttr', array('active' => "false"));
}

if (ax('attr', 'style') == '') {
    ax('setAttr', array('style' => "padding:10px 0 0 0;"));
}
?>
<div data-tab-panel='{label: "<?=ax('attr', 'label')?>", active: <?=ax('attr', 'active')?>}'>
    <div style="<?=ax('attr', 'style')?>" data-split-panel-wrap="<?=ax('attr', 'scroll')?>">
<?=ax('setAttr', array('width' => '', 'height' => '', 'style' => '', 'clazz' => '', 'scroll' => '', 'label' => '', 'active' => ''))?>
