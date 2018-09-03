# PHP Template Engine Benchmark

## What Does It Do?

This benchmark will render a number of templates, each with a specific template functionality, for a number of times per engine.
An average of elapsed time and memory usage is then generated and printed.

## Getting Started

To run the tests yourself, clone the repository and run the ```src/benchmark.php``` script.

```
git clone -b develop https://github.com/huqis/template-engine-benchmark.git
cd template-engine-benchmark
composer install
php src/benchmark.php 10
```

## Template Engine Features

||Blade|Haanga|Huqis|Latte|Smarty|Twig|
|---|---|---|---|---|---|---|
|__Variables__|||||||
|Auto-escape support|yes|yes|yes|yes|yes|yes|
|Transparant array, object handling|no|no|yes|no|no|yes|
|__Functions__|||||||
|Define reusable blocks|yes|maybe|yes|yes|yes|yes|
|__Control__|||||||
|elseif|yes|no|yes|yes|yes|yes|
|first, last when looping|yes|bugger|yes|yes|yes|yes|
|inline statements|no|yes|yes|yes|yes|yes|
|__Inheritance__|||||||
|includes|yes|yes|yes|yes|yes|yes|
|includes with arguments|yes|no|yes|yes|yes|yes|yes|
|dynamic includes|yes|yes|yes|yes|yes|yes|yes|
|extends|yes|yes|yes|yes|yes|yes|
|dynamic extends|yes|yes|yes|yes|yes|yes|

## Output

Without arguments:

```
$> php src/benchmark.php
PHP Template Engine Benchmark

usage: php src/benchmark.php <numRuns> [<engines> [<tests>]]

- <numRuns>: Number of runs for each test
- <engines>: Comma separated list of engine names
- <tests>: Comma separated list of test names

Engines
- blade
- haanga
- huqis
- latte
- smarty
- twig

Tests
- empty
- extends
- extends-dynamic
- functions
- include
- include-arguments
- include-dynamic
- loop-10
- loop-100
- loop-1000
```

Running the benchmark 500 times on all engines:

```
$> php src/benchmark.php 500
PHP Template Engine Benchmark

Benchmarking engines (500 runs):
- blade...
- haanga...
- huqis...
- latte...
- smarty...
- twig...

# Results with uncompiled templates (500 runs)

| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| engine                | min time   | max time   | avg time   | min mem      | max mem      | avg mem      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| BLADE                 |            |            |            |              |              |              | 
| empty                 | 5.661 ms   | 6.074 ms   | 5.739 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| loop-10               | 6.219 ms   | 7.316 ms   | 6.318 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| loop-100              | 6.905 ms   | 8.262 ms   | 7.011 ms   | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| loop-1000             | 12.465 ms  | 14.549 ms  | 12.66 ms   | 976.56 Kb    | 2.07 Mb      | 2.07 Mb      | 
| functions             | 6.106 ms   | 7.03 ms    | 6.198 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include               | 6.976 ms   | 33.499 ms  | 7.222 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-dynamic       | 6.595 ms   | 31.974 ms  | 6.789 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| include-arguments     | 6.987 ms   | 32.426 ms  | 7.191 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends               | 6.231 ms   | 31.551 ms  | 6.465 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends-dynamic       | 6.151 ms   | 31.177 ms  | 6.451 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HAANGA                |            |            |            |              |              |              | 
| empty                 | 6.051 ms   | 7.141 ms   | 6.132 ms   | 976.56 Kb    | 1.14 Mb      | 1.14 Mb      | 
| loop-10               | 8.673 ms   | 9.093 ms   | 8.77 ms    | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| loop-100              | 9.252 ms   | 10.615 ms  | 9.399 ms   | 976.56 Kb    | 1.27 Mb      | 1.27 Mb      | 
| loop-1000             | 14.787 ms  | 17.05 ms   | 15.524 ms  | 976.56 Kb    | 2.17 Mb      | 2.17 Mb      | 
| include               | 8.689 ms   | 9.086 ms   | 8.796 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| include-dynamic       | 8.155 ms   | 9.585 ms   | 8.27 ms    | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| extends               | 8.179 ms   | 9.685 ms   | 8.276 ms   | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| extends-dynamic       | 7.468 ms   | 7.782 ms   | 7.554 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HUQIS                 |            |            |            |              |              |              | 
| empty                 | 4.923 ms   | 5.847 ms   | 5.006 ms   | 710.18 Kb    | 710.18 Kb    | 710.18 Kb    | 
| loop-10               | 9.843 ms   | 10.99 ms   | 10.144 ms  | 803.14 Kb    | 803.15 Kb    | 803.15 Kb    | 
| loop-100              | 11.476 ms  | 13.631 ms  | 11.648 ms  | 912.8 Kb     | 912.8 Kb     | 912.8 Kb     | 
| loop-1000             | 25.244 ms  | 30.333 ms  | 26.275 ms  | 976.56 Kb    | 1.81 Mb      | 1.81 Mb      | 
| functions             | 6.753 ms   | 7.736 ms   | 6.841 ms   | 790.11 Kb    | 790.12 Kb    | 790.12 Kb    | 
| include               | 7.9 ms     | 9.118 ms   | 8.004 ms   | 764.65 Kb    | 764.65 Kb    | 764.65 Kb    | 
| include-dynamic       | 7.82 ms    | 33.093 ms  | 8.118 ms   | 810.7 Kb     | 810.7 Kb     | 810.7 Kb     | 
| include-arguments     | 11.544 ms  | 12.613 ms  | 11.779 ms  | 780.61 Kb    | 780.62 Kb    | 780.62 Kb    | 
| extends               | 6.906 ms   | 7.271 ms   | 7.007 ms   | 762.87 Kb    | 762.88 Kb    | 762.87 Kb    | 
| extends-dynamic       | 7.964 ms   | 32.503 ms  | 8.185 ms   | 771.14 Kb    | 771.15 Kb    | 771.15 Kb    | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| LATTE                 |            |            |            |              |              |              | 
| empty                 | 5.142 ms   | 27.486 ms  | 5.255 ms   | 887.88 Kb    | 887.88 Kb    | 887.88 Kb    | 
| loop-10               | 10.627 ms  | 35.349 ms  | 10.965 ms  | 976.56 Kb    | 1.15 Mb      | 1.15 Mb      | 
| loop-100              | 12.346 ms  | 37.549 ms  | 12.723 ms  | 976.56 Kb    | 1.26 Mb      | 1.26 Mb      | 
| loop-1000             | 28.206 ms  | 30.406 ms  | 29.068 ms  | 976.56 Kb    | 2.18 Mb      | 2.18 Mb      | 
| functions             | 8.138 ms   | 27.95 ms   | 8.373 ms   | 976.56 Kb    | 1.11 Mb      | 1.11 Mb      | 
| include               | 10.943 ms  | 30.41 ms   | 11.282 ms  | 976.56 Kb    | 1.13 Mb      | 1.13 Mb      | 
| include-dynamic       | 9.773 ms   | 29.993 ms  | 9.935 ms   | 976.56 Kb    | 1.12 Mb      | 1.12 Mb      | 
| include-arguments     | 12.433 ms  | 37.449 ms  | 12.888 ms  | 976.56 Kb    | 1.13 Mb      | 1.13 Mb      | 
| extends               | 9.332 ms   | 28.641 ms  | 9.565 ms   | 976.56 Kb    | 1.11 Mb      | 1.11 Mb      | 
| extends-dynamic       | 8.47 ms    | 30.447 ms  | 8.694 ms   | 976.56 Kb    | 1.1 Mb       | 1.1 Mb       | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| SMARTY                |            |            |            |              |              |              | 
| empty                 | 10.462 ms  | 35.884 ms  | 10.789 ms  | 976.56 Kb    | 1.7 Mb       | 1.7 Mb       | 
| loop-10               | 14.508 ms  | 40.619 ms  | 14.819 ms  | 976.56 Kb    | 2 Mb         | 2 Mb         | 
| loop-100              | 14.759 ms  | 16.079 ms  | 15.063 ms  | 976.56 Kb    | 2.1 Mb       | 2.1 Mb       | 
| loop-1000             | 18.972 ms  | 21.094 ms  | 19.304 ms  | 976.56 Kb    | 3.02 Mb      | 3.02 Mb      | 
| functions             | 13.664 ms  | 15.584 ms  | 13.84 ms   | 976.56 Kb    | 1.99 Mb      | 1.99 Mb      | 
| include               | 15.161 ms  | 41.427 ms  | 15.632 ms  | 976.56 Kb    | 1.93 Mb      | 1.93 Mb      | 
| include-dynamic       | 14.749 ms  | 40.443 ms  | 15.157 ms  | 976.56 Kb    | 1.99 Mb      | 1.99 Mb      | 
| include-arguments     | 15.689 ms  | 41.22 ms   | 16.08 ms   | 976.56 Kb    | 1.94 Mb      | 1.94 Mb      | 
| extends               | 14.838 ms  | 40.732 ms  | 15.155 ms  | 976.56 Kb    | 1.96 Mb      | 1.96 Mb      | 
| extends-dynamic       | 14.163 ms  | 38.294 ms  | 14.466 ms  | 976.56 Kb    | 1.94 Mb      | 1.94 Mb      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| TWIG                  |            |            |            |              |              |              | 
| empty                 | 8.812 ms   | 10.168 ms  | 8.916 ms   | 976.56 Kb    | 1.3 Mb       | 1.3 Mb       | 
| loop-10               | 11.885 ms  | 13.627 ms  | 12.068 ms  | 976.56 Kb    | 1.59 Mb      | 1.59 Mb      | 
| loop-100              | 13.945 ms  | 16.152 ms  | 14.444 ms  | 976.56 Kb    | 1.76 Mb      | 1.76 Mb      | 
| loop-1000             | 32.969 ms  | 41.329 ms  | 36.103 ms  | 976.56 Kb    | 3.32 Mb      | 3.32 Mb      | 
| functions             | 11.029 ms  | 13.672 ms  | 11.22 ms   | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| include               | 12.42 ms   | 13.012 ms  | 12.575 ms  | 976.56 Kb    | 1.44 Mb      | 1.44 Mb      | 
| include-dynamic       | 12.224 ms  | 12.875 ms  | 12.489 ms  | 976.56 Kb    | 1.47 Mb      | 1.47 Mb      | 
| include-arguments     | 12.869 ms  | 13.652 ms  | 13.129 ms  | 976.56 Kb    | 1.45 Mb      | 1.45 Mb      | 
| extends               | 11.001 ms  | 11.907 ms  | 11.133 ms  | 976.56 Kb    | 1.44 Mb      | 1.44 Mb      | 
| extends-dynamic       | 10.472 ms  | 11.219 ms  | 10.766 ms  | 976.56 Kb    | 1.42 Mb      | 1.42 Mb      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 

# Results with compiled templates in cache (500 runs)

| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| engine                | min time   | max time   | avg time   | min mem      | max mem      | avg mem      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| BLADE                 |            |            |            |              |              |              | 
| empty                 | 5.607 ms   | 6.575 ms   | 5.693 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| loop-10               | 5.837 ms   | 6.74 ms    | 5.919 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| loop-100              | 6.498 ms   | 7.389 ms   | 6.592 ms   | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| loop-1000             | 12.052 ms  | 13.112 ms  | 12.223 ms  | 976.56 Kb    | 2.07 Mb      | 2.07 Mb      | 
| functions             | 5.704 ms   | 6.576 ms   | 5.784 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include               | 6.331 ms   | 7.246 ms   | 6.417 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-dynamic       | 5.962 ms   | 6.918 ms   | 6.048 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-arguments     | 6.342 ms   | 7.269 ms   | 6.433 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends               | 5.789 ms   | 6.707 ms   | 5.87 ms    | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends-dynamic       | 5.722 ms   | 6.625 ms   | 5.821 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HAANGA                |            |            |            |              |              |              | 
| empty                 | 0.389 ms   | 0.455 ms   | 0.399 ms   | 26.53 Kb     | 26.53 Kb     | 26.53 Kb     | 
| loop-10               | 0.577 ms   | 0.705 ms   | 0.597 ms   | 45.63 Kb     | 45.63 Kb     | 45.63 Kb     | 
| loop-100              | 1.138 ms   | 1.412 ms   | 1.235 ms   | 155.28 Kb    | 155.28 Kb    | 155.28 Kb    | 
| loop-1000             | 6.695 ms   | 9.076 ms   | 7.707 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| include               | 0.73 ms    | 0.823 ms   | 0.748 ms   | 51.13 Kb     | 51.13 Kb     | 51.13 Kb     | 
| include-dynamic       | 0.66 ms    | 0.774 ms   | 0.685 ms   | 43.61 Kb     | 43.61 Kb     | 43.61 Kb     | 
| extends               | 0.551 ms   | 0.635 ms   | 0.566 ms   | 51.62 Kb     | 51.62 Kb     | 51.62 Kb     | 
| extends-dynamic       | 0.504 ms   | 0.698 ms   | 0.518 ms   | 41.17 Kb     | 41.17 Kb     | 41.17 Kb     | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HUQIS                 |            |            |            |              |              |              | 
| empty                 | 3.004 ms   | 3.203 ms   | 3.053 ms   | 445.23 Kb    | 445.23 Kb    | 445.23 Kb    | 
| loop-10               | 3.5 ms     | 4.398 ms   | 3.561 ms   | 487.54 Kb    | 487.54 Kb    | 487.54 Kb    | 
| loop-100              | 4.997 ms   | 5.983 ms   | 5.098 ms   | 597.2 Kb     | 597.2 Kb     | 597.2 Kb     | 
| loop-1000             | 19.625 ms  | 21.445 ms  | 20.314 ms  | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| functions             | 3.403 ms   | 3.926 ms   | 3.454 ms   | 470.1 Kb     | 470.11 Kb    | 470.11 Kb    | 
| include               | 3.284 ms   | 4.184 ms   | 3.333 ms   | 479.38 Kb    | 479.38 Kb    | 479.38 Kb    | 
| include-dynamic       | 3.564 ms   | 4.94 ms    | 3.622 ms   | 476.51 Kb    | 476.51 Kb    | 476.51 Kb    | 
| include-arguments     | 3.346 ms   | 3.604 ms   | 3.396 ms   | 490.01 Kb    | 490.02 Kb    | 490.02 Kb    | 
| extends               | 3.206 ms   | 3.416 ms   | 3.255 ms   | 464.21 Kb    | 464.21 Kb    | 464.21 Kb    | 
| extends-dynamic       | 3.292 ms   | 3.715 ms   | 3.341 ms   | 462.89 Kb    | 462.89 Kb    | 462.89 Kb    | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| LATTE                 |            |            |            |              |              |              | 
| empty                 | 1.864 ms   | 2.74 ms    | 1.903 ms   | 344.31 Kb    | 344.32 Kb    | 344.32 Kb    | 
| loop-10               | 2.356 ms   | 3.251 ms   | 2.414 ms   | 384.52 Kb    | 384.52 Kb    | 384.52 Kb    | 
| loop-100              | 4.097 ms   | 4.984 ms   | 4.221 ms   | 494.17 Kb    | 494.17 Kb    | 494.17 Kb    | 
| loop-1000             | 20.999 ms  | 22.911 ms  | 21.833 ms  | 976.56 Kb    | 1.38 Mb      | 1.38 Mb      | 
| functions             | 2.221 ms   | 2.799 ms   | 2.288 ms   | 368.45 Kb    | 368.45 Kb    | 368.45 Kb    | 
| include               | 2.343 ms   | 3.235 ms   | 2.411 ms   | 396.55 Kb    | 396.55 Kb    | 396.55 Kb    | 
| include-dynamic       | 2.398 ms   | 2.67 ms    | 2.443 ms   | 390.38 Kb    | 390.38 Kb    | 390.38 Kb    | 
| include-arguments     | 2.377 ms   | 2.582 ms   | 2.435 ms   | 397.4 Kb     | 397.4 Kb     | 397.4 Kb     | 
| extends               | 2.066 ms   | 2.235 ms   | 2.108 ms   | 370.45 Kb    | 370.45 Kb    | 370.45 Kb    | 
| extends-dynamic       | 2.021 ms   | 2.28 ms    | 2.058 ms   | 361.87 Kb    | 361.87 Kb    | 361.87 Kb    | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| SMARTY                |            |            |            |              |              |              | 
| empty                 | 2.769 ms   | 3.017 ms   | 2.816 ms   | 429.97 Kb    | 429.97 Kb    | 429.97 Kb    | 
| loop-10               | 3.21 ms    | 3.385 ms   | 3.253 ms   | 483.13 Kb    | 483.13 Kb    | 483.13 Kb    | 
| loop-100              | 3.544 ms   | 4.43 ms    | 3.597 ms   | 592.79 Kb    | 592.79 Kb    | 592.79 Kb    | 
| loop-1000             | 7.73 ms    | 9.135 ms   | 7.845 ms   | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| functions             | 3.229 ms   | 4.144 ms   | 3.295 ms   | 473.61 Kb    | 473.61 Kb    | 473.61 Kb    | 
| include               | 3.292 ms   | 4.167 ms   | 3.343 ms   | 473.45 Kb    | 473.45 Kb    | 473.45 Kb    | 
| include-dynamic       | 3.338 ms   | 3.71 ms    | 3.395 ms   | 483.2 Kb     | 483.21 Kb    | 483.21 Kb    | 
| include-arguments     | 3.323 ms   | 4.231 ms   | 3.376 ms   | 480.13 Kb    | 480.13 Kb    | 480.13 Kb    | 
| extends               | 3.244 ms   | 4.111 ms   | 3.309 ms   | 492.99 Kb    | 492.99 Kb    | 492.99 Kb    | 
| extends-dynamic       | 3.191 ms   | 4.055 ms   | 3.243 ms   | 477.16 Kb    | 477.16 Kb    | 477.16 Kb    | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| TWIG                  |            |            |            |              |              |              | 
| empty                 | 3.29 ms    | 3.865 ms   | 3.369 ms   | 507.52 Kb    | 507.52 Kb    | 507.52 Kb    | 
| loop-10               | 3.823 ms   | 4.189 ms   | 3.912 ms   | 616.15 Kb    | 616.15 Kb    | 616.15 Kb    | 
| loop-100              | 5.907 ms   | 7.768 ms   | 6.397 ms   | 791.9 Kb     | 791.9 Kb     | 791.9 Kb     | 
| loop-1000             | 25.264 ms  | 33.627 ms  | 28.974 ms  | 976.56 Kb    | 2.32 Mb      | 2.32 Mb      | 
| functions             | 3.585 ms   | 3.842 ms   | 3.659 ms   | 582.14 Kb    | 582.14 Kb    | 582.14 Kb    | 
| include               | 3.913 ms   | 4.797 ms   | 3.981 ms   | 616.43 Kb    | 616.43 Kb    | 616.43 Kb    | 
| include-dynamic       | 3.867 ms   | 4.741 ms   | 3.926 ms   | 616.08 Kb    | 616.08 Kb    | 616.08 Kb    | 
| include-arguments     | 3.94 ms    | 4.885 ms   | 4.023 ms   | 621.87 Kb    | 621.87 Kb    | 621.87 Kb    | 
| extends               | 3.527 ms   | 4.378 ms   | 3.58 ms    | 596.84 Kb    | 596.84 Kb    | 596.84 Kb    | 
| extends-dynamic       | 3.478 ms   | 4.396 ms   | 3.537 ms   | 588.95 Kb    | 588.95 Kb    | 588.95 Kb    | 
| --------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ |
```

These are a lot of numbers which can help you with choosing a template engine.
However, how a template language writes and feels is not something one can measure.
This can be just as important, if not more, as performance.
