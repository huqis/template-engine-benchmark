<?php

include __DIR__ . '/../bootstrap.php';

$views = __DIR__ . '/templates';
$cache = __DIR__ . '/compile';

$blade = new Philo\Blade\Blade($views, $cache);

function render($template, array $variables) {
    global $blade;

    echo $blade->view()->make(str_replace('.tpl', '', $template), $variables)->render();
}
