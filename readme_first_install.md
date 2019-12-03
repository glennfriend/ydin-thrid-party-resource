## First Install

### dependency
- laravel
- composer guzzlehttp/guzzle
- composer doctrine/cache
- data cache folder in "./storage/third-party-resource"

### install from composer
```
composer require "ydin/third-party-resource:0.1.0"
```

### vi .gitignore
```
/storage/third-party-resource/*
```

### vi .env
```
THIRD_PARTY_RESOURCE_USE="production"
```
