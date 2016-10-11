<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>AXBOOT :: Full Stack Web Development Framework</title>

    <link rel="shortcut icon" href="<?=ax('url', '/assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="icon" href="<?=ax('url', '/assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?=ax('url', '/assets/css/axboot.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=ax('url', '/assets/css/lang-kor.css')?>"/>
    <?php foreach($this->_css as $_css): ?><?=$_css?><?php endforeach; ?>

    <script type="text/javascript">
        var CONTEXT_PATH = "<?=ax('get', 'contextPath')?>";
        var TOP_MENU_DATA = (function(json){return json;})(<?=ax('get', 'menuJson')?>);
        var COMMON_CODE = (function(json){return json;})(<?=ax('get', 'commonCodeJson')?>);
        var SCRIPT_SESSION = (function(json){return json;})(<?=ax('get', 'scriptSession')?>);
    </script>

    <script type="text/javascript" src="<?=ax('url', '/assets/js/plugins.min.js')?>"></script>
    <script type="text/javascript" src="<?=ax('url', '/assets/js/axboot/dist/axboot.js')?>"></script>
    <?php foreach($this->_js as $_js): ?><?=$_js?><?php endforeach; ?>
</head>
<body class="ax-body <?=ax('get', 'axbody_class')?>" onselectstart="return false;">
<div id="ax-frame-root" class="show-aside" data-root-container="true">
    <?=ax('doBody')?>

    <div class="ax-frame-header-tool">

        <div class="ax-split-col" style="height: 100%;">
            <div class="ax-split-panel text-align-left">

            </div>
            <div class="ax-split-panel text-align-right">

                <div class="ax-split-col ax-frame-user-info">
                    <div class="ax-split-panel">
                        <a href="#ax" onclick="fcObj.open_user_info();"><?=ax('loginUser', 'userNm')?></a>님 로그인
                    </div>
                    <div class="panel-split"></div>
                    <div class="ax-split-panel">
                        <a href="#ax" class="ax-frame-logout" onclick="location.href = '<?=ax('siteUrl', '/api/logout')?>';">
                            <i class="cqc-log-out"></i>
                            <lang data-id="로그아웃"></lang>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="ax-frame-header">
        <div class="ax-split-col" style="height: 100%;">
            <div class="ax-split-panel cell-aside-handle" id="ax-aside-handel">
                <i class="cqc-menu"></i>
            </div>
            <div class="ax-split-panel cell-logo">
                <a href="<?=ax('siteUrl', '/admin/main')?>">
                    <img src="<?=ax('url', '/assets/images/header-logo.png')?>" width="100%"/>
                </a>
            </div>
            <div id="ax-top-menu" class="ax-split-panel ax-split-flex">

            </div>
        </div>
    </div>

    <div class="ax-frame-header-tab">
        <div id="ax-frame-header-tab-container"></div>
    </div>

    <div class="ax-frame-aside" id="ax-frame-aside"></div>
    <script type="text/html" data-tmpl="ax-frame-aside">
        <div class="ax-frame-aside-menu-holder">
            <div style="height: 10px;"></div>
            {{#items}}
            <a class="aside-menu-item aside-menu-item-label {{#open}}opend{{/open}}" data-label-index="{{@i}}">{{{name}}}</a>
            <div class="aside-menu-item aside-menu-item-tree-body {{#open}}opend{{/open}}" data-tree-body-index="{{@i}}">
                <div class="tree-holder ztree" id="aside-menu-{{@i}}" data-tree-holder-index="{{@i}}"></div>
            </div>
            {{/items}}
        </div>
    </script>

    <div class="ax-frame-foot">
        <div class="ax-split-col" style="height: 100%;">
            <div class="ax-split-panel text-align-left">
                AXBOOT 2.0.0 - Web Application Framework © 2010-2016
            </div>
            <div class="ax-split-panel text-align-right">
                Last account activity 52 mins ago
            </div>
        </div>
    </div>

</div>
</body>
</html>