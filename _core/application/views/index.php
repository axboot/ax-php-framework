<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>AXBOOT :: </title>

    <link rel="shortcut icon" href="<?=base_url('assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="icon" href="<?=base_url('assets/favicon.ico')?>" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/axboot.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/lang-kor.css')?>"/>
    <script type="text/javascript">
        var CONTEXT_PATH = "";
        var SCRIPT_SESSION = (function(json){return json;})({"userCd":null,"userNm":null,"compCd":null,"storCd":null,"locale":null,"timeZone":null,"dateFormat":null,"login":false,"dateTimeFormat":"null null","timeFormat":null});
    </script>
    <script type="text/javascript" src="<?=base_url('assets/js/plugins.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/axboot/dist/axboot.js')?>"></script>

    <script type="text/javascript" src="<?=base_url('assets/js/axboot/dist/good-words.js')?>"></script>
</head>
<body class="ax-body login">
<table style="width:100%;height:100%;">
    <tr>
        <td align="center" valign="middle">

            <div>
                <img src="/assets/images/login-logo.png" class="img-logo">
            </div>

            <div class="panel">
                <div class="panel-heading">아이디와 패스워드를 입력해주세요.</div>
                <div class="panel-body">
                    <form name="login-form" class="" method="post" action="/api/login" onsubmit="return fnObj.login();" autocomplete="off">

                        <div class="form-group">
                            <label for="userCd"><i class="cqc-new-message"></i> ID</label>
                            <input type="text" name="userCd" id="userCd" value="system" class="form-control ime-false" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label for="userPs"><i class="cqc-key"></i> Password</label>
                            <input type="password" name="userPs" id="userPs" value="1234" class="form-control ime-false" placeholder=""/>
                        </div>

                        <input type="hidden"
                               name="" value=""/>

                        <div class="ax-padding-box" style="text-align: right;">
                            <button type="submit" class="btn">&nbsp;&nbsp;로그인&nbsp;&nbsp;</button>
                        </div>

                    </form>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#">아이디 찾기</a>
                        &nbsp;
                        &nbsp;
                        <a href="#">비밀번호 찾기</a>
                    </li>

                </ul>
            </div>

            <div class="txt-copyrights">
                AXBOOT 2.0 - Full Stack Web Application Framework © 2010-2016
            </div>

            <div class="txt-good-words" id="good_words">

            </div>

        </td>
    </tr>
</table>

<script type="text/javascript">
    var fnObj = {
        pageStart: function () {
            $("#good_words").html(goodWords.get());
        },
        login: function () {
            axboot.ajax({
                method: "POST",
                url: "/api/login",
                data: JSON.stringify({
                    "userCd": $("#userCd").val(),
                    "userPs": $("#userPs").val()
                }),
                callback: function (res) {
                    if (res && res.error) {
                        if (res.error.message == "Unauthorized") {
                            alert("로그인에 실패 하였습니다. 계정정보를 확인하세요");
                        }
                        else {
                            alert(res.error.message);
                        }
                        return;
                    }
                    else {
                        location.reload();
                    }
                },
                options: {
                    nomask: false, apiType: "login"
                }
            });
            return false;
        }
    };
</script>
</body>
</html>