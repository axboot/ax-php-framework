<?php
    if(!ax('attr', 'id')) {
        ax('setAttr', array('id' => ax('attr', 'name')));
    }
    if(!ax('attr', 'onsubmit')) {
        ax('setAttr', array('onsubmit' => 'return false'));
    }
    if(!ax('attr', 'method')) {
        ax('setAttr', array('method' => 'post'));
    }
?>
<form name="<?=ax('attr', 'name')?>" id="<?=ax('attr', 'id')?>" method="<?=ax('attr', 'method')?>" onsubmit="<?=ax('attr', 'onsubmit')?>" style="<?=ax('attr', 'style')?>">
<?=ax('setAttr', array('name' => '', 'id' => '', 'metthod' => '', 'style'  => '', 'onsubmit' => '', 'valign' => ''))?>