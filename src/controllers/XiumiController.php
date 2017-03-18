<?php
namespace zacksleo\yii2\ueditor\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class XiumiController extends Controller
{
    public function actionScript()
    {
        header('Content-type: application/javascript');
        $url = Url::to(['xiumi/dialog']);
        $js = <<<JS
UE.registerUI('dialog', function (editor, uiName) {
    var btn = new UE.ui.Button({
        name   : 'xiumi-connect',
        title  : '秀米',
        onclick: function () {
            var dialog = new UE.ui.Dialog({
                iframeUrl: '{$url}',
                editor   : editor,
                name     : 'xiumi-connect',
                title    : "秀米图文消息助手",
                cssRules : "width: " + (window.innerWidth - 60) + "px;" + "height: " + (window.innerHeight - 60) + "px;",
            });
            dialog.render();
            dialog.open();
        }
    });
    return btn;
});
JS;
        echo $js;
    }

    public function actionDialog()
    {
        return $this->renderPartial('dialog');
    }
}
