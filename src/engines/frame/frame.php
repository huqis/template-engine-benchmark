<?php

include __DIR__ . '/../bootstrap.php';

// footer();
// echo "\ncreating cache\n";
$frameCache = new frame\library\cache\DirectoryTemplateCache($directory . '/frame/compile');
// footer();
// echo "\ncreating resource handler\n";
$frameResourceHandler = new frame\library\resource\DirectoryTemplateResourceHandler($directory . '/frame/templates');
// footer();
// echo "\ncreating context\n";
$frameContext = new frame\library\DefaultTemplateContext($frameResourceHandler);
// footer();
// echo "\ncreating engine\n";
$frame = new frame\library\TemplateEngine($frameContext);
// footer();
// echo "\nset cache\n";
$frame->setCache($frameCache);
// footer();
// echo "\nrunning test\n";

function render($template, array $variables) {
    global $frame;

    echo $frame->render($template, $variables);
}
