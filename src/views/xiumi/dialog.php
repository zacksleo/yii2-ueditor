<?php
use kucha\ueditor\UEditorAsset;
$assets = UEditorAsset::register($this);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>XIUMI connect</title>
    <style>
        html, body {
            padding: 0;
            margin: 0;
        }

        #xiumi {
            position: absolute;
            width: 100%;
            height: 100%;
            border: none;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<iframe id="xiumi"
        src="//xiumi.us/studio/v5#/paper">
</iframe>
<script type="text/javascript" src="<?= $assets->baseUrl; ?>dialogs/internal.js"></script>
<script>
    var xiumi = document.getElementById('xiumi');
    var xiumi_url = "http://xiumi.us";
    xiumi.onload = function () {
        console.log("postMessage");
        xiumi.contentWindow.postMessage('ready', xiumi_url);
    };
    document.addEventListener("mousewheel", function (event) {
        event.preventDefault();
        event.stopPropagation();
    });
    window.addEventListener('message', function (event) {
        if (event.origin == xiumi_url) {
            editor.execCommand('insertHtml', event.data);
            dialog.close();
        }
    }, false);
</script>
</body>
</html>
