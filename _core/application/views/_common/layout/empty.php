<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>AXBOOT :: </title>

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
<body class="ax-body <?=isset($axbody_class) ? $axbody_class : ''?>">
    <?=ax('doBody')?>
</body>
</html>