<?php

include __DIR__ . "/../bootstrap.php";

$smarty = new Smarty();
$smarty->setEscapeHtml(true);
$smarty->setTemplateDir($directory . '/smarty/templates');
$smarty->setCompileDir($directory . '/smarty/compile');

function render($template, array $variables) {
    global $smarty;

    foreach ($variables as $name  => $value) {
        $smarty->assign($name, $value);
    }

    $smarty->display($template);
}
