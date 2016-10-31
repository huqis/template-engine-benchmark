<?php

include __DIR__ . "/../bootstrap.php";

$loader = new Twig_Loader_Filesystem($directory . '/twig/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => $directory . '/twig/compile',
));

function render($template, array $variables) {
    global $twig;

    $template = $twig->loadTemplate($template);
    $template->display($variables);
}
