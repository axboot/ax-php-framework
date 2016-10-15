<?=ax('set', array(
    'title' => ax('get', 'pageName'),
    'page_desc' => ax('get', 'PAGE_REMARK'),
    'page_auto_height' => 'false'
))?>

<?=ax('js', '/assets/plugins/prettify/prettify.js')?>
<?=ax('js', '/assets/plugins/prettify/lang-css.js')?>

<?=ax('css', '/assets/plugins/prettify/skins/github.css')?>

<?=ax('layout', 'base')?>
    <?=ax('page-buttons')?><?=ax('/page-buttons')?>

    <div class="panel panel-default">
        <div class="panel-body">
            <?=ax('markdown', array('src' => "/md/api.md"))?><?=ax('/markdown')?>
        </div>
    </div>

<?=ax('/layout')?>

<script>
    $(document.body).ready(function () {
        $(document.body).find("pre").addClass("prettyprint linenums lang-js");
        if (window["prettyPrint"]) window["prettyPrint"]();
    });
</script>