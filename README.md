# PHP Template Engine Benchmark

## Getting Started

To run the tests yourself, clone the repository and run the ```src/benchmark.php``` script.

```
git clone https://github.com/php-frame/php-template-engine-benchmark.git
php php-template-engine-benchmark/src/benchmark.php
```

## Template Engine Features

||Frame|Haanga|Latte|Smarty|Twig|
|---|---|---|---|---|---|
|__Variables__||||||
|Auto-escape support|no|yes|yes|yes|yes|
|Transparant array, object handling|yes|no|no|no|yes|
|__Functions__||||||
|Define reusable blocks|yes|no|yes|yes|yes|
|__Control__||||||
|elseif|yes|no|yes|yes|yes|
|first, last when looping|yes|only last|yes|yes|yes|
|__Inheritance__||||||
|includes|yes|yes|yes|yes|yes|
|includes with arguments|yes|no|yes|yes|yes|yes|
|dynamic includes|yes|yes|yes|yes|yes|yes|
|extends|yes|yes|yes|yes|yes|
|dynamic extends|yes|yes|yes|yes|yes|
