## For developer

### vi .gitignore
```
/packages/__*
```

### clone your package
```
git clone xxxxxxxxxx "packages/__ydin-third-party-resource"
```

### local development
```
pname="third-party-resource"
composer remove "ydin/${pname}"
composer config "repositories.${pname}" path "packages/__ydin-${pname}"
composer require "ydin/${pname}:dev-master" --update-with-dependencies
```

### git tag push
```
git tag 0.1.0  --force
git push origin --tags  --force
```

### update packagist.org
```
update to https://packagist.org/packages/ydin/third-party-resource (or hook)
```

### remove local to install composer packages
```
pname="third-party-resource";
composer remove "ydin/${pname}"
composer config "repositories.${pname}" path ""
composer require "ydin/${pname}:0.1.0"
```

### vi .gitignore
```
/packages/__*
/storage/third-party-resource/*
```

### about APIDOC
```
npm install apidoc apidoc-plugin-json -g
apidoc -i ./src/ -o ./apidoc

php -S 127.0.0.1:6000
google-chrome http://127.0.0.1:6000/apidoc/ &
```
