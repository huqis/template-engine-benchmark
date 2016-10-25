# PHP Template Engine Benchmark

## What Does It Do?

This benchmark will render a number of templates, each with a specific template functionality, for a number of times per engine.
An average of elapsed time and memory usage is then generated and printed.

## Getting Started

To run the tests yourself, clone the repository and run the ```src/benchmark.php``` script.

```
git clone -b develop https://github.com/php-frame/php-template-engine-benchmark.git
cd php-template-engine-benchmark
composer install
php src/benchmark.php 10
```

## Template Engine Features

||Frame|Haanga|Latte|Smarty|Twig|
|---|---|---|---|---|---|
|__Variables__||||||
|Auto-escape support|no|yes|yes|yes|yes|
|Transparant array, object handling|yes|no|no|no|yes|
|__Functions__||||||
|Define reusable blocks|yes|maybe|yes|yes|yes|
|__Control__||||||
|elseif|yes|no|yes|yes|yes|
|first, last when looping|yes|bugger|yes|yes|yes|
|__Inheritance__||||||
|includes|yes|yes|yes|yes|yes|
|includes with arguments|yes|no|yes|yes|yes|yes|
|dynamic includes|yes|yes|yes|yes|yes|yes|
|extends|yes|yes|yes|yes|yes|
|dynamic extends|yes|yes|yes|yes|yes|

