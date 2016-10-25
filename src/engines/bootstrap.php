<?php

include __DIR__ . "/../../vendor/autoload.php";

$directory = dirname(__file__);

$time = microtime(true);
$memory = memory_get_usage();

function footer() {
    global $memory, $time;

    echo "\n" . (microtime(true) - $time) . ' ' . (memory_get_usage() - $memory);
}

register_shutdown_function('footer');
