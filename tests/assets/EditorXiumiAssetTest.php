<?php

namespace tests\assets;

use tests\TestCase;
use zacksleo\yii2\ueditor\assets\EditorXiumiAsset;

/**
 * Class EditorXiumiAssetTest
 * @package tests\assets
 * @author zacksleo <zacksleo@gmail.com>
 */
class EditorXiumiAssetTest extends TestCase
{
    public function testAssets()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        EditorXiumiAsset::register($view);
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\ueditor\\assets\\EditorXiumiAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\ueditor\\assets\\EditorXiumiAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('xiumi-editor.css', $content);
    }
}
