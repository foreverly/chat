yii2-qiniu
=================================

--------------------------------
 `composer.json`:

```json
{
  "require": {
    "flyok666/yii2-qiniu": "~1.0.0"
  }
}
```

Usage
-----

```php
<?php

use flyok666\qiniu\Qiniu;
$config = [
'accessKey'=>'xxx',
'secretKey'=>'xxx',
'domain'=>'http://demo.domain.com/',
'bucket'=>'demo',
'area'=>Qiniu::AREA_HUABEI
];



$qiniu = new Qiniu($config);
$key = time();
$qiniu->uploadFile($_FILES['tmp_name'],$key);
$url = $qiniu->getLink($key);
```
