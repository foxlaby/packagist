# komicho\packagist
Analyze packages within the project

## Install via composer
Add orm to composer.json configuration file.

```
$ composer require komicho/packagist
```

## Get list
```php
use komicho\packagist;
$pack = new packagist();
$list = $pack->get(<options>)->list();
```
options: all (default) || name || version
### Results
```json
...
{
    name: "egulias/email-validator",
    version: "2.1.7"
},
{
    name: "erusev/parsedown",
    version: "1.7.1"
},
{
    name: "fideloper/proxy",
    version: "4.0.0"
}
...
```

## name and version
```php
use komicho\packagist;
$pack = new packagist();
$list = $pack->nameVersion(<name>);
```
name: Void (default) Here comes all the packages || Select the name of the package in order for the version to appear
### Results
```json
...
jakub-onderka/php-console-highlighter: "v0.4",
komicho/packagist: "dev-master",
laravel/framework: "v5.7.19",
laravel/nexmo-notification-channel: "v1.0.1",
laravel/slack-notification-channel: "v1.0.3",
laravel/tinker: "v1.0.8",
lcobucci/jwt: "3.2.5",
league/flysystem: "1.0.49",
monolog/monolog: "1.24.0",
nesbot/carbon: "1.36.2",
nexmo/client: "1.6.0",
nikic/php-parser: "v4.1.1",
...
```

## Get info from local
```php
use komicho\packagist;
$pack = new packagist();
$list = $pack->getInfoLocal(<name>);
```
name: Void (default) get all the packages || Show the package information specified by its name
### Results
```json
...
name: "doctrine/inflector",
version: "v1.3.0",
source: {
    type: "git",
    url:"https://github.com/doctrine/inflector.git",
    reference: "5527a48b7313d15261292c149e55e26eae771b0a"
},
dist: {
    type: "zip",
    url: "https://api.github.com/repos/doctrine/inflector/zipball/5527a48b7313d15261292c149e55e26eae771b0a",
    reference: "5527a48b7313d15261292c149e55e26eae771b0a",
    shasum: ""
    },
    require: {
        php: "^7.1"
    },
    require-dev: {
        phpunit/phpunit: "^6.2"
    },
    type: "library",
    extra: {
        branch-alias: {
        dev-master: "1.3.x-dev"
    }
},
autoload: {
    psr-4: {
    Doctrine\Common\Inflector\: "lib/Doctrine/Common/Inflector"
    }
},
...
```

## Get info from remotely
```php
use komicho\packagist;
$pack = new packagist();
$list = $pack->getInfoRemotely(<name>);
```
name: Show the package information specified by its name
### Results
```json
{
package: {
    name: "laravel/laravel",
    description: "The Laravel Framework.",
    time: "2013-05-31T13:31:16+00:00",
    maintainers: [
        {
        name: "taylorotwell",
        avatar_url: "https://www.gravatar.com/avatar/f30ff8ad2367afd407a1678e7d8d851f?d=identicon"
        }
    ],
    versions: {
    dev-master: {
    name: "laravel/laravel",
    description: "The Laravel Framework.",
    keywords: [
        "framework",
        "laravel"
    ],
    homepage: "",
...
```

## Count
```php
use komicho\packagist;
$pack = new packagist();
$number_of_packs = $pack->count();
```
### Results
```
55
```