<?php

include __DIR__ . '/../bootstrap.php';

$frameCache = new frame\library\cache\DirectoryTemplateCache($directory . '/frame/compile');
$frameResourceHandler = new frame\library\resource\DirectoryTemplateResourceHandler($directory . '/frame/templates');
$frameContext = new frame\library\DefaultTemplateContext($frameResourceHandler);

$frame = new frame\library\TemplateEngine($frameContext);
$frame->setCache($frameCache);

function render($template, array $variables) {
    global $frame;

    echo $frame->render($template, $variables);
}
