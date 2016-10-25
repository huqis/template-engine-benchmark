<?php

include __DIR__ . '/../bootstrap.php';

$dwoo = new Dwoo\Core($directory . '/dwoo/compile');

function render($template, array $variables) {
    global $dwoo;

    echo $dwoo->get(new Dwoo\Template\File($template), $variables);
}

