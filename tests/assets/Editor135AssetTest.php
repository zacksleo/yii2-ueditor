<?php

namespace tests\assets;

use tests\TestCase;
use zacksleo\yii2\ueditor\assets\Editor135Asset;
use yii\web\AssetBundle;

/**
 * Class Editor135AssetTest
 * @package tests\assets
 * @author zacksleo <zacksleo@gmail.com>
 */
class Editor135AssetTest extends TestCase
{
    public function testAssets()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        Editor135Asset::register($view);
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\ueditor\\assets\\Editor135Asset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['zacksleo\\yii2\\ueditor\\assets\\Editor135Asset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('135-editor.css', $content);
    }
}
