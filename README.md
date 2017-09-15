## Yii2 135编辑/秀米编辑器器扩展

[![Latest Stable Version](https://poser.pugx.org/zacksleo/yii2-ueditor/version)](https://packagist.org/packages/zacksleo/yii2-ueditor)
[![Total Downloads](https://poser.pugx.org/zacksleo/yii2-ueditor/downloads)](https://packagist.org/packages/zacksleo/yii2-ueditor)
[![License](https://poser.pugx.org/zacksleo/yii2-ueditor/license)](https://packagist.org/packages/zacksleo/yii2-ueditor)

[![Travis](https://img.shields.io/travis/zacksleo/yii2-ueditor.svg)]()
[![Build Status](https://travis-ci.org/zacksleo/yii2-ueditor.svg?branch=master)](https://travis-ci.org/zacksleo/yii2-ueditor)
[![Code Climate](https://img.shields.io/codeclimate/github/zacksleo/yii2-ueditor.svg)]()
[![Scrutinizer](https://img.shields.io/scrutinizer/g/zacksleo/yii2-ueditor.svg)]()
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/zacksleo/yii2-ueditor.svg)]()

该插件根据[135编辑器企业插件](http://www.135plat.com/135_ueditor_plugin.html)
和[秀米编辑器Ueditor插件](http://hgs.xiumi.us/uedit/)封装而来

## 用法

### 1. 在 config/main 中配置 module 为:

```
 'ueditor' => [
     'class' => 'zacksleo\yii2\ueditor\Module'
 ]
     
```

### 2. 在页面中使用

加载135编辑器插件:
 
 ```
 use zacksleo\yii2\ueditor\assets\Editor135Asset;
 Editor135Asset::register($this); 
 
 $this->registerJsFile('/admin/ueditor/i25/script',[
     'depends'=>[
         'kucha\ueditor\UeditorAsset'
     ]
 ]);
 
 echo \kucha\ueditor\UEditor::widget([
     'name' => 'ueditor',
     'clientOptions' => [
         //编辑区域大小
         'initialFrameHeight' => '200',
         //设置语言
         'lang' => 'zh-cn', //中文为 zh-cn
         'zIndex' => '9995',
         //定制菜单
         'toolbars' => [
             [
                 'fullscreen', 'source', 'undo', 'redo', '|',
                 'fontsize',
                 'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                 'forecolor', 'backcolor', '|',
                 'lineheight', '|',
                 'indent', '|', '135editor'
             ],
         ]
     ]
 ]);
 
 ```
 
 加载秀米编辑器插件:
  
  ```
  use zacksleo\yii2\ueditor\assets\EditorXiumiAsset;
  EditorXiumiAsset::register($this); 
  
  $this->registerJsFile('/admin/ueditor/xiumi/script',[
      'depends'=>[
          'kucha\ueditor\UeditorAsset'
      ]
  ]);
  
  echo \kucha\ueditor\UEditor::widget([
      'name' => 'ueditor',
      'clientOptions' => [
          //编辑区域大小
          'initialFrameHeight' => '200',
          //设置语言
          'lang' => 'zh-cn', //中文为 zh-cn
          'zIndex' => '9995',
          //定制菜单
          'toolbars' => [
              [
                  'fullscreen', 'source', 'undo', 'redo', '|',
                  'fontsize',
                  'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                  'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                  'forecolor', 'backcolor', '|',
                  'lineheight', '|',
                  'indent', '|', '135editor'
              ],
          ]
      ]
  ]);
  
  ```
### 3. 更多关于 \kucha\ueditor\UEditor 的用法见[文档](https://github.com/BigKuCha/yii2-ueditor-widget)
