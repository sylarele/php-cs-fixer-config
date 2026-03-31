# PHP-CS-Fixer Config

[![License](https://img.shields.io/github/license/sylarele/php-cs-fixer-config.svg)](https://github.com/sylarele/php-cs-fixer-config/blob/main/LICENSE "LICENSE")
![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/sylarele/php-cs-fixer-config/php)
[![Packagist Downloads](https://img.shields.io/packagist/dm/sylarele/php-cs-fixer-config)](https://packagist.org/packages/sylarele/http-query-config "Packagist")

Configuration for https://github.com/FriendsOfPhp/PHP-CS-Fixer

## Installation

```shell
composer require --dev sylarele/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file `.php-cs-fixer.php` in the root of your project:

```php
<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfig;
use Sylarele\PhpCsFixerConfig\Config;

$finder = Finder::create()
    ->exclude('storage')
    ->in(__DIR__)
    ->append([
        __FILE__,
    ]);

$config = new Config();

return $config
    ->setCacheFile(__DIR__.'/storage/tmp/php-cs-fixer/.php-cs-fixer.cache')
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setParallelConfig(new ParallelConfig(6, 80));
```

### Custom configuration

You may extend these rules and apply your own extra rules.

Create a configuration file `.php-cs-fixer.php` in the root of your project:

```php
<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfig;

$finder = Finder::create()
    ->exclude('storage')
    ->in(__DIR__)
    ->append([
        __FILE__,
    ]);

$config = new class() extends PhpCsFixer\Config {
    public function __construct()
    {
        parent::__construct('Customized Sylarele');
        
        $this->setRiskyAllowed(true);
    }
    
    public function getRules(): array
    {
        $rules = (new Sylarele\PhpCsFixerConfig\Config())->getRules();
        
        // Update the rules table here
        
        return $rules;
    }
};

$config->setFinder($finder);

return $config;
```