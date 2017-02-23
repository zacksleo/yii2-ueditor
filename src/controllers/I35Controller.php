<?php
namespace zacksleo\yii2\ueditor\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class I35Controller extends Controller
{
    public function actionScript()
    {
        header('Content-type: application/javascript');
        $url = Url::to(['i35/dialog']);
        $js = <<<JS
UE.registerUI('135editor',function(editor,uiName){
    var dialog = new UE.ui.Dialog({
        iframeUrl: '{$url}',
        editor:editor,
        name:uiName,
        title:"135编辑器"
    });
    dialog.fullscreen = true;
    dialog.draggable = false;
    var btn = new UE.ui.Button({
        name:'btn-dialog-' + uiName,
        className:'edui-for-135editor',
        title:'135编辑器',
        onclick:function () {
            dialog.render();
            dialog.open();
        }
    });
    return btn;
},undefined);
// 修改最后的undefined参数为数字序号，比如5，可调整135编辑器按钮的顺序。默认出现在最后面
JS;
        echo $js;

    }

    public function actionDialog()
    {
        return $this->renderPartial('dialog');
    }
}