<?php

include __DIR__ . "/../bootstrap.php";

Haanga::configure(array(
    'template_dir' => $directory . '/haanga/templates',
    'cache_dir' => $directory . '/haanga/compile',
));

function render($template, array $variables) {
    Haanga::Load($template, $variables);
}
