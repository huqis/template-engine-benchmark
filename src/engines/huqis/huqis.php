<?php

include __DIR__ . '/../bootstrap.php';

$cache = new huqis\cache\DirectoryTemplateCache($directory . '/huqis/compile');
$resourceHandler = new huqis\resource\DirectoryTemplateResourceHandler($directory . '/huqis/templates');
$context = new huqis\DefaultTemplateContext($resourceHandler);

$huqis = new huqis\TemplateEngine($context, $cache);

function render($template, array $variables) {
    global $huqis;

    echo $huqis->render($template, $variables);
}
