<?php
    ax('setAttr', array('_oriental' => ax('attr', 'oriental')));

    if (ax('attr', 'width')) {
        ax('setAttr', array('style' => ax('attr', 'style') . ';width:' . ax('attr', 'width')));
    }
    if (ax('attr', 'height')) {
        ax('setAttr', array('style' => ax('attr', 'style') . ';height:' . ax('attr', 'height')));
    }
?>
<div data-ax5layout="<?=ax('attr', 'name')?>" role="page-content" data-config='{layout:"split-panel", oriental: "<?=ax('attr', 'oriental')?>", splitter: {size: 7}}' style="<?=ax('attr', 'style')?>">
<?=ax('setAttr', array('name' => '', 'clazz' => '', 'style' => '', 'oriental' => '', 'margin' => '', 'width' => '', 'height' => ''))?>