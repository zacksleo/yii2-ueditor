<?php

namespace zacksleo\yii2\ueditor\assets;

use yii\web\AssetBundle;

class Editor135Asset extends AssetBundle
{
    public $sourcePath = '@vendor/zacksleo/yii2-ueditor/src/assets';

    public $css = [
        '135-editor.css'
    ];

    public $publishOptions = [
        'only' => [
            '135-editor.css'
        ]
    ];
}