<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport"
          content="width=1024, user-scalable=yes, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
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
    <script type="text/javascript" src="<?=ax('url', '/axboot.config.js')?>"></script>
    <?php foreach($this->_js as $_js): ?><?=$_js?><?php endforeach; ?>
</head>
<body class="ax-body <?=ax('get', 'axbody_class')?>" data-page-auto-height="<?=ax('get', 'page_auto_height')?>">
<div id="ax-base-root" data-root-container="true">
    <div class="ax-base-title" role="page-title">
        <?php if($pageContent = ax('get', 'header')): ?>
            <?=$pageContent?>
        <?php else: ?>
            <h1 class="title"><i class="cqc-browser"></i> <?=ax('get', 'pageName')?></h1>
            <p class="desc"><?=ax('get', 'pageRemark')?></p>
        <?php endif; ?>
    </div>
    <div class="ax-base-content">
        <?=ax('doBody')?>
    </div>
</div>
</body>
</html>