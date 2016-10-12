<div role="page-header">
    <?=ax('form', array('name' => 'searchView0'))?>
        <?=ax('tbl', array('clazz' => 'ax-search-tbl', 'minWidth' => '500px;'))?>
            <?=ax('tr')?>
                <?=ax('td', array('label' => '검색', 'width' => '300px'))?>
                    <input type="text" name="filter" id="filter" class="form-control" value="" placeholder="검색어를 입력하세요."/>
                <?=ax('/td')?>
            <?=ax('/tr')?>
        <?=ax('/tbl')?>
    <?=ax('/form')?>
    <div class="H10"></div>
</div>