<?php

namespace zacksleo\yii2\ueditor\assets;

use yii\web\AssetBundle;

class EditorXiumiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/zacksleo/yii2-ueditor/src/assets';

    public $css = [
        'xiumi-editor.css'
    ];

    public $publishOptions = [
        'only' => [
            'xiumi-editor.css'
        ]
    ];
}
