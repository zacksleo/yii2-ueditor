<?php

namespace tests;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\View;
use yii\web\AssetManager;

/**
 * This is the base class for all yii framework unit tests.
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();

        $this->setupTestDbData();

        $this->createRuntimeFolder();
    }

    protected function tearDown()
    {
        $this->destroyApplication();
    }

    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application')
    {
        return new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'sqlite::memory:'
                ],
                'request' => [
                    'hostInfo' => 'http://domain.com',
                    'scriptUrl' => 'index.php',
                ],
                'user' => [
                    'identityClass' => 'tests\data\models\User',
                ],
            ],
            'modules' => [
                'ueditor' => [
                    'class' => 'zacksleo\yii2\ueditor\Module',
                    'controllerNamespace' => 'zacksleo\yii2\ueditor\controllers'
                ]
            ]
        ], $config));
    }

    /**
     * @return string vendor path
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
    }

    /**
     * Setup tables for test ActiveRecord
     */
    protected function setupTestDbData()
    {
        $db = Yii::$app->getDb();
    }

    /**
     * Creates a view for testing purposes
     *
     * @return View
     */
    protected function getView()
    {
        $view = new View();
        $view->setAssetManager(new AssetManager([
            'basePath' => '@tests/data/assets',
            'baseUrl' => '/',
        ]));
        return $view;
    }

    /**
     * Create runtime folder
     */
    protected function createRuntimeFolder()
    {
        FileHelper::createDirectory(dirname(__DIR__) . '/tests/runtime');
    }
}
