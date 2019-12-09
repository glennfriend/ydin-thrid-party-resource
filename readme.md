## Third Party Resource Build

### how to use
```
$api = $resourceBuild->groupName()->apiName();
   
$response = $api->send($array);
$response = $api->getResponse($array);
$text     = $api->getJson();
$text     = $api->getJsonCache();
$text     = $api->getJsonForever();
$array    = $api->getArray();
$array    = $api->getArrayCache();
$array    = $api->getArrayForever();
```

### example
```
use ThirdPartyResource\ResourceBuild;

$api = $resourceBuild->fsTracking()->biActionlogs();
$api->send($row);

$api = $resourceBuild->kidguard()->processor();
$api->getResponse($row);
    
$api = $resourceBuild->beeFree()->templates();
$api->getJsonCache($row, 86400);
```

### how to try APIs
```
php artisan third-party-resource:api-acceptance-test
```

### API URL setting
```
code config/third-party-resource.php
```

### cache files
```
ls storage/third-party-resource/*.json
```

### in 未來
```
- 將 apidoc build 到 github homepage
- ResourceBuild 用 gen code 產生, 資料來自於 ThirdParty/Api/*/*.php
```
