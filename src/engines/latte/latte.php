<?php

include __DIR__ . "/../bootstrap.php";

$latte = new Latte\Engine;
$latte->setLoader(new Latte\Loaders\FileLoader($directory . '/latte/templates'));
$latte->setTempDirectory($directory . '/latte/compile');

function render($template, array $variables) {
    global $latte;

    $latte->render($template, $variables);
}
