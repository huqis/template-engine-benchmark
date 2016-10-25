<?php

include __DIR__ . "/../bootstrap.php";

// footer();
// echo "\ncreating loader\n";
$loader = new Twig_Loader_Filesystem($directory . '/twig/templates');
// footer();
// echo "\ncreate environment\n";
$twig = new Twig_Environment($loader, array(
    'cache' => $directory . '/twig/compile',
    'autoescape' => false,
));
// footer();
// echo "\nrunning test\n";

function render($template, array $variables) {
    global $twig;

    $template = $twig->loadTemplate($template);
    $template->display($variables);
}
