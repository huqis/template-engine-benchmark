<?php

$engine = null;
$test = null;

if (isset($_SERVER['argv'][0])) {
    if (!isset($_SERVER['argv'][1]) || !isset($_SERVER['argv'][2])) {
        echo "Template Engine Test Runner\n\n";
        echo 'usage: php ' . $_SERVER['argv'][0] . ' <engine> <test>' . "\n";

        exit(1);
    }

    $engine = $_SERVER['argv'][1];
    $test = $_SERVER['argv'][2];
} else {
    if (isset($_GET['engine'])) {
        $engine = $_GET['engine'];
    }

    if (isset($_GET['test'])) {
        $test = $_GET['test'];
    }

    if (!$engine || !$test) {
        echo '<h2>Template Engine Test Runner</h2>';
        echo 'usage: ' . $_SERVER['SCRIPT_NAME'] . '?engine=&lt;engine>&test=&lt;test>';

        exit;
    }
}

$engineFile = __DIR__ . '/engines/' . $engine . '/' . $engine . '.php';
if (!file_exists($engineFile)) {
    echo 'error: Engine '. $engine . ' does not exists' . "\n";

    exit(1);
}

$testFile = __DIR__ . '/tests/' . $test . '.php';
if (!file_exists($testFile)) {
    echo 'error: Test '. $test . ' does not exists' . "\n";

    exit(1);
}

include $engineFile;
include $testFile;

try {
    render($template, $variables);
} catch (Exception $exception) {
    $e = $exception;

    do {
        echo $e->getMessage() . "\n";
        echo $e->getTraceAsString();

        $e = $e->getPrevious();
        if ($e) {
            echo "\nCaused by:\n\n";
        }
    } while ($e);
    exit(1);
}
