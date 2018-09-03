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

| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| engine                    | min time   | max time   | avg time   | min mem      | max mem      | avg mem      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| BLADE                     |            |            |            |              |              |              | 
| empty                     | 5.662 ms   | 6.566 ms   | 5.753 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| loop-10                   | 6.246 ms   | 6.979 ms   | 6.325 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| loop-100                  | 6.914 ms   | 7.871 ms   | 7.018 ms   | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| loop-1000                 | 12.163 ms  | 13.48 ms   | 12.651 ms  | 976.56 Kb    | 2.07 Mb      | 2.07 Mb      | 
| functions                 | 6.105 ms   | 7.006 ms   | 6.198 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include                   | 6.971 ms   | 33.919 ms  | 7.272 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-dynamic           | 6.583 ms   | 32.358 ms  | 6.806 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| include-arguments         | 6.984 ms   | 32.432 ms  | 7.187 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends                   | 6.221 ms   | 31.314 ms  | 6.462 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends-dynamic           | 6.158 ms   | 31.281 ms  | 6.403 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HAANGA                    |            |            |            |              |              |              | 
| empty                     | 6.03 ms    | 6.557 ms   | 6.121 ms   | 976.56 Kb    | 1.14 Mb      | 1.14 Mb      | 
| loop-10                   | 8.669 ms   | 10.855 ms  | 8.774 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| loop-100                  | 9.237 ms   | 10.939 ms  | 9.394 ms   | 976.56 Kb    | 1.27 Mb      | 1.27 Mb      | 
| loop-1000                 | 14.687 ms  | 17.19 ms   | 15.422 ms  | 976.56 Kb    | 2.17 Mb      | 2.17 Mb      | 
| include                   | 8.708 ms   | 9.643 ms   | 8.799 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| include-dynamic           | 7.814 ms   | 8.586 ms   | 8.267 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| extends                   | 8.193 ms   | 10.172 ms  | 8.277 ms   | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| extends-dynamic           | 7.461 ms   | 7.777 ms   | 7.549 ms   | 976.56 Kb    | 1.16 Mb      | 1.16 Mb      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HUQIS                     |            |            |            |              |              |              | 
| empty                     | 4.919 ms   | 6.228 ms   | 5 ms       | 710.18 Kb    | 710.18 Kb    | 710.18 Kb    | 
| loop-10                   | 9.962 ms   | 10.859 ms  | 10.143 ms  | 803.15 Kb    | 803.15 Kb    | 803.15 Kb    | 
| loop-100                  | 11.255 ms  | 12.478 ms  | 11.627 ms  | 912.8 Kb     | 912.8 Kb     | 912.8 Kb     | 
| loop-1000                 | 25.401 ms  | 32.036 ms  | 26.24 ms   | 976.56 Kb    | 1.81 Mb      | 1.81 Mb      | 
| functions                 | 6.742 ms   | 26.133 ms  | 6.866 ms   | 790.12 Kb    | 790.12 Kb    | 790.12 Kb    | 
| include                   | 7.893 ms   | 8.783 ms   | 7.997 ms   | 764.65 Kb    | 764.65 Kb    | 764.65 Kb    | 
| include-dynamic           | 7.817 ms   | 33.037 ms  | 8.015 ms   | 810.7 Kb     | 810.7 Kb     | 810.7 Kb     | 
| include-arguments         | 11.328 ms  | 12.634 ms  | 11.733 ms  | 780.61 Kb    | 780.62 Kb    | 780.62 Kb    | 
| extends                   | 6.899 ms   | 8.231 ms   | 7.002 ms   | 762.87 Kb    | 762.88 Kb    | 762.87 Kb    | 
| extends-dynamic           | 7.96 ms    | 32.411 ms  | 8.249 ms   | 771.15 Kb    | 771.15 Kb    | 771.15 Kb    | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| LATTE                     |            |            |            |              |              |              | 
| empty                     | 5.138 ms   | 27.53 ms   | 5.3 ms     | 887.88 Kb    | 887.88 Kb    | 887.88 Kb    | 
| loop-10                   | 10.644 ms  | 28.202 ms  | 10.834 ms  | 976.56 Kb    | 1.15 Mb      | 1.15 Mb      | 
| loop-100                  | 12.235 ms  | 35.84 ms   | 12.719 ms  | 976.56 Kb    | 1.26 Mb      | 1.26 Mb      | 
| loop-1000                 | 28.223 ms  | 77.597 ms  | 29.298 ms  | 976.56 Kb    | 2.18 Mb      | 2.18 Mb      | 
| functions                 | 8.141 ms   | 27.567 ms  | 8.293 ms   | 976.56 Kb    | 1.11 Mb      | 1.11 Mb      | 
| include                   | 10.897 ms  | 38.413 ms  | 11.254 ms  | 976.56 Kb    | 1.13 Mb      | 1.13 Mb      | 
| include-dynamic           | 9.776 ms   | 36.081 ms  | 10.066 ms  | 976.56 Kb    | 1.12 Mb      | 1.12 Mb      | 
| include-arguments         | 12.436 ms  | 38.31 ms   | 12.836 ms  | 976.56 Kb    | 1.13 Mb      | 1.13 Mb      | 
| extends                   | 9.342 ms   | 35.895 ms  | 9.679 ms   | 976.56 Kb    | 1.11 Mb      | 1.11 Mb      | 
| extends-dynamic           | 8.454 ms   | 29.1 ms    | 8.625 ms   | 976.56 Kb    | 1.1 Mb       | 1.1 Mb       | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| SMARTY                    |            |            |            |              |              |              | 
| empty                     | 10.591 ms  | 11.561 ms  | 10.706 ms  | 976.56 Kb    | 1.7 Mb       | 1.7 Mb       | 
| loop-10                   | 14.385 ms  | 17.645 ms  | 14.709 ms  | 976.56 Kb    | 2 Mb         | 2 Mb         | 
| loop-100                  | 14.786 ms  | 17.01 ms   | 14.999 ms  | 976.56 Kb    | 2.1 Mb       | 2.1 Mb       | 
| loop-1000                 | 18.848 ms  | 21.919 ms  | 19.235 ms  | 976.56 Kb    | 3.02 Mb      | 3.02 Mb      | 
| functions                 | 13.627 ms  | 16.607 ms  | 13.823 ms  | 976.56 Kb    | 1.99 Mb      | 1.99 Mb      | 
| include                   | 14.715 ms  | 40.251 ms  | 15.416 ms  | 976.56 Kb    | 1.93 Mb      | 1.93 Mb      | 
| include-dynamic           | 14.659 ms  | 17.459 ms  | 14.919 ms  | 976.56 Kb    | 1.99 Mb      | 1.99 Mb      | 
| include-arguments         | 15.525 ms  | 42.785 ms  | 15.886 ms  | 976.56 Kb    | 1.94 Mb      | 1.94 Mb      | 
| extends                   | 14.777 ms  | 39.112 ms  | 15.118 ms  | 976.56 Kb    | 1.96 Mb      | 1.96 Mb      | 
| extends-dynamic           | 14.138 ms  | 40.186 ms  | 14.478 ms  | 976.56 Kb    | 1.94 Mb      | 1.94 Mb      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| TWIG                      |            |            |            |              |              |              | 
| empty                     | 8.777 ms   | 12.419 ms  | 8.91 ms    | 976.56 Kb    | 1.3 Mb       | 1.3 Mb       | 
| loop-10                   | 11.915 ms  | 13.673 ms  | 12.087 ms  | 976.56 Kb    | 1.59 Mb      | 1.59 Mb      | 
| loop-100                  | 14.025 ms  | 15.659 ms  | 14.463 ms  | 976.56 Kb    | 1.76 Mb      | 1.76 Mb      | 
| loop-1000                 | 33.263 ms  | 41.624 ms  | 36.436 ms  | 976.56 Kb    | 3.32 Mb      | 3.32 Mb      | 
| functions                 | 11.025 ms  | 12.816 ms  | 11.199 ms  | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| include                   | 12.076 ms  | 13.105 ms  | 12.573 ms  | 976.56 Kb    | 1.44 Mb      | 1.44 Mb      | 
| include-dynamic           | 12.274 ms  | 13.78 ms   | 12.498 ms  | 976.56 Kb    | 1.47 Mb      | 1.47 Mb      | 
| include-arguments         | 12.668 ms  | 14.853 ms  | 13.133 ms  | 976.56 Kb    | 1.45 Mb      | 1.45 Mb      | 
| extends                   | 10.99 ms   | 12.446 ms  | 11.127 ms  | 976.56 Kb    | 1.44 Mb      | 1.44 Mb      | 
| extends-dynamic           | 10.63 ms   | 11.448 ms  | 10.753 ms  | 976.56 Kb    | 1.42 Mb      | 1.42 Mb      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 

# Results with compiled templates in cache (500 runs)

| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| engine                    | min time   | max time   | avg time   | min mem      | max mem      | avg mem      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| BLADE                     |            |            |            |              |              |              | 
| empty                     | 5.601 ms   | 6.284 ms   | 5.685 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| loop-10                   | 5.83 ms    | 6.725 ms   | 5.915 ms   | 976.56 Kb    | 1.07 Mb      | 1.07 Mb      | 
| loop-100                  | 6.487 ms   | 9.654 ms   | 6.63 ms    | 976.56 Kb    | 1.17 Mb      | 1.17 Mb      | 
| loop-1000                 | 11.708 ms  | 14.626 ms  | 12.209 ms  | 976.56 Kb    | 2.07 Mb      | 2.07 Mb      | 
| functions                 | 5.698 ms   | 6.64 ms    | 5.778 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include                   | 6.324 ms   | 7.246 ms   | 6.409 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-dynamic           | 5.955 ms   | 6.675 ms   | 6.037 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| include-arguments         | 6.343 ms   | 7.291 ms   | 6.427 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends                   | 5.78 ms    | 6.666 ms   | 5.857 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| extends-dynamic           | 5.744 ms   | 6.657 ms   | 5.818 ms   | 976.56 Kb    | 1.06 Mb      | 1.06 Mb      | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HAANGA                    |            |            |            |              |              |              | 
| empty                     | 0.389 ms   | 0.465 ms   | 0.398 ms   | 26.53 Kb     | 26.53 Kb     | 26.53 Kb     | 
| loop-10                   | 0.574 ms   | 0.694 ms   | 0.596 ms   | 45.63 Kb     | 45.63 Kb     | 45.63 Kb     | 
| loop-100                  | 1.135 ms   | 1.393 ms   | 1.228 ms   | 155.28 Kb    | 155.28 Kb    | 155.28 Kb    | 
| loop-1000                 | 6.703 ms   | 9.337 ms   | 7.709 ms   | 976.56 Kb    | 1.05 Mb      | 1.05 Mb      | 
| include                   | 0.728 ms   | 1.081 ms   | 0.747 ms   | 51.13 Kb     | 51.13 Kb     | 51.13 Kb     | 
| include-dynamic           | 0.66 ms    | 0.78 ms    | 0.685 ms   | 43.61 Kb     | 43.61 Kb     | 43.61 Kb     | 
| extends                   | 0.552 ms   | 0.63 ms    | 0.564 ms   | 51.62 Kb     | 51.62 Kb     | 51.62 Kb     | 
| extends-dynamic           | 0.504 ms   | 0.585 ms   | 0.516 ms   | 41.17 Kb     | 41.17 Kb     | 41.17 Kb     | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| HUQIS                     |            |            |            |              |              |              | 
| empty                     | 3.004 ms   | 3.88 ms    | 3.05 ms    | 445.23 Kb    | 445.23 Kb    | 445.23 Kb    | 
| loop-10                   | 3.51 ms    | 4.031 ms   | 3.553 ms   | 487.54 Kb    | 487.54 Kb    | 487.54 Kb    | 
| loop-100                  | 4.997 ms   | 6.012 ms   | 5.094 ms   | 597.2 Kb     | 597.2 Kb     | 597.2 Kb     | 
| loop-1000                 | 19.496 ms  | 25.181 ms  | 20.207 ms  | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| functions                 | 3.397 ms   | 3.642 ms   | 3.447 ms   | 470.1 Kb     | 470.11 Kb    | 470.11 Kb    | 
| include                   | 3.281 ms   | 4.128 ms   | 3.327 ms   | 479.38 Kb    | 479.38 Kb    | 479.38 Kb    | 
| include-dynamic           | 3.56 ms    | 4.095 ms   | 3.613 ms   | 476.51 Kb    | 476.51 Kb    | 476.51 Kb    | 
| include-arguments         | 3.34 ms    | 3.484 ms   | 3.391 ms   | 490.01 Kb    | 490.02 Kb    | 490.02 Kb    | 
| extends                   | 3.205 ms   | 4.066 ms   | 3.255 ms   | 464.21 Kb    | 464.21 Kb    | 464.21 Kb    | 
| extends-dynamic           | 3.29 ms    | 4.148 ms   | 3.337 ms   | 462.89 Kb    | 462.89 Kb    | 462.89 Kb    | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| LATTE                     |            |            |            |              |              |              | 
| empty                     | 1.864 ms   | 2.127 ms   | 1.899 ms   | 344.31 Kb    | 344.32 Kb    | 344.32 Kb    | 
| loop-10                   | 2.359 ms   | 2.495 ms   | 2.409 ms   | 384.52 Kb    | 384.52 Kb    | 384.52 Kb    | 
| loop-100                  | 4.095 ms   | 5.08 ms    | 4.225 ms   | 494.17 Kb    | 494.17 Kb    | 494.17 Kb    | 
| loop-1000                 | 21.046 ms  | 23.393 ms  | 21.805 ms  | 976.56 Kb    | 1.38 Mb      | 1.38 Mb      | 
| functions                 | 2.22 ms    | 2.401 ms   | 2.283 ms   | 368.45 Kb    | 368.45 Kb    | 368.45 Kb    | 
| include                   | 2.336 ms   | 3.768 ms   | 2.408 ms   | 396.55 Kb    | 396.55 Kb    | 396.55 Kb    | 
| include-dynamic           | 2.394 ms   | 3.263 ms   | 2.441 ms   | 390.38 Kb    | 390.38 Kb    | 390.38 Kb    | 
| include-arguments         | 2.352 ms   | 2.871 ms   | 2.434 ms   | 397.4 Kb     | 397.4 Kb     | 397.4 Kb     | 
| extends                   | 2.065 ms   | 2.506 ms   | 2.107 ms   | 370.45 Kb    | 370.45 Kb    | 370.45 Kb    | 
| extends-dynamic           | 2.021 ms   | 2.923 ms   | 2.058 ms   | 361.87 Kb    | 361.87 Kb    | 361.87 Kb    | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| SMARTY                    |            |            |            |              |              |              | 
| empty                     | 2.765 ms   | 2.97 ms    | 2.813 ms   | 429.97 Kb    | 429.97 Kb    | 429.97 Kb    | 
| loop-10                   | 3.203 ms   | 4.057 ms   | 3.251 ms   | 483.13 Kb    | 483.13 Kb    | 483.13 Kb    | 
| loop-100                  | 3.542 ms   | 3.991 ms   | 3.593 ms   | 592.79 Kb    | 592.79 Kb    | 592.79 Kb    | 
| loop-1000                 | 7.726 ms   | 10.726 ms  | 7.844 ms   | 976.56 Kb    | 1.48 Mb      | 1.48 Mb      | 
| functions                 | 3.186 ms   | 3.456 ms   | 3.278 ms   | 473.61 Kb    | 473.61 Kb    | 473.61 Kb    | 
| include                   | 3.254 ms   | 3.824 ms   | 3.334 ms   | 473.45 Kb    | 473.45 Kb    | 473.45 Kb    | 
| include-dynamic           | 3.338 ms   | 3.561 ms   | 3.391 ms   | 483.2 Kb     | 483.21 Kb    | 483.21 Kb    | 
| include-arguments         | 3.322 ms   | 3.872 ms   | 3.368 ms   | 480.13 Kb    | 480.13 Kb    | 480.13 Kb    | 
| extends                   | 3.252 ms   | 3.78 ms    | 3.304 ms   | 493.09 Kb    | 493.09 Kb    | 493.09 Kb    | 
| extends-dynamic           | 3.197 ms   | 4.087 ms   | 3.237 ms   | 477.16 Kb    | 477.16 Kb    | 477.16 Kb    | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
| TWIG                      |            |            |            |              |              |              | 
| empty                     | 3.311 ms   | 5.423 ms   | 3.369 ms   | 507.52 Kb    | 507.52 Kb    | 507.52 Kb    | 
| loop-10                   | 3.818 ms   | 4.809 ms   | 3.914 ms   | 616.15 Kb    | 616.15 Kb    | 616.15 Kb    | 
| loop-100                  | 5.923 ms   | 7.543 ms   | 6.394 ms   | 791.89 Kb    | 791.9 Kb     | 791.9 Kb     | 
| loop-1000                 | 24.847 ms  | 33.267 ms  | 28.892 ms  | 976.56 Kb    | 2.32 Mb      | 2.32 Mb      | 
| functions                 | 3.577 ms   | 3.829 ms   | 3.651 ms   | 582.14 Kb    | 582.14 Kb    | 582.14 Kb    | 
| include                   | 3.902 ms   | 4.755 ms   | 3.975 ms   | 616.43 Kb    | 616.43 Kb    | 616.43 Kb    | 
| include-dynamic           | 3.86 ms    | 4.128 ms   | 3.913 ms   | 616.08 Kb    | 616.08 Kb    | 616.08 Kb    | 
| include-arguments         | 3.944 ms   | 4.99 ms    | 4.021 ms   | 621.87 Kb    | 621.87 Kb    | 621.87 Kb    | 
| extends                   | 3.425 ms   | 4.427 ms   | 3.573 ms   | 596.84 Kb    | 596.84 Kb    | 596.84 Kb    | 
| extends-dynamic           | 3.483 ms   | 4.743 ms   | 3.533 ms   | 588.95 Kb    | 588.95 Kb    | 588.95 Kb    | 
| ------------------------- | ---------- | ---------- | ---------- | ------------ | ------------ | ------------ | 
```

These are a lot of numbers which can help you with choosing a template engine.
However, how a template language writes and feels is not something one can measure.
This can be just as important, if not more, as performance.
