<?php
    ax('setAttr', array(
        'trLabelWidth' => ax('attr', 'labelWidth'),
        'trWidth' => ax('attr', 'width')
    ));
?>
<div data-ax-tr="<?=ax('attr', 'id')?>" id="<?=ax('attr', 'id')?>" class="<?=ax('attr', 'clazz')?>" style="<?=ax('attr', 'style')?>">
<?=ax('setAttr', array('id' => '',  'clazz' => '', 'style' => '', 'labelWidth' => '', 'width' => ''))?>

