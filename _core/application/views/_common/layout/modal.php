<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=1024, user-scalable=yes, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>AXBOOT :: <?=ax('get', 'pageName')?></title>

    <link rel="shortcut icon" href="<?=ax('url', '/assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="icon" href="<?=ax('url', '/assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?=ax('url', '/assets/css/axboot.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=ax('url', '/assets/css/lang-kor.css')?>"/>
    <?php foreach($this->_css as $_css): ?><?=$_css?><?php endforeach; ?>
    <script type="text/javascript">
        var CONTEXT_PATH = "<?=ax('get', 'contextPath')?>";
        var SCRIPT_SESSION = (function(json){return json;})(<?=ax('get', 'scriptSession')?>);
    </script>

    <script type="text/javascript" src="<?=ax('url', '/assets/js/plugins.min.js')?>"></script>
    <script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/dist/axboot.js')?>"></script>
    <?php foreach($this->_js as $_js): ?><?=$_js?><?php endforeach; ?>
</head>
<body class="ax-body <?=ax('get', 'axbody_class')?>" data-page-auto-height="<?=ax('get', 'page_auto_height')?>">
<div id="ax-modal-base-root" data-root-container="true">
    <?php if(ax('get', 'header')):?>
        <div class="ax-base-title" role="page-title"> <?=ax('get', 'header')?> </div>
    <?php endif; ?>
    <div class="ax-base-content">
        <?=ax('doBody')?>
    </div>
</div>

</body>
</html>