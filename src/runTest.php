<?php

$engine = null;
$test = null;
$isCli = false;

if (isset($_SERVER['argv'][0])) {
    if (!isset($_SERVER['argv'][1]) || !isset($_SERVER['argv'][2])) {
        echo "Template Engine Test Runner\n\n";
        echo 'usage: php ' . $_SERVER['argv'][0] . ' <engine> <test>' . "\n";

        exit(1);
    }

    $engine = $_SERVER['argv'][1];
    $test = $_SERVER['argv'][2];
    $isCli = true;
} else {
    if (isset($_GET['engine'])) {
        $engine = $_GET['engine'];
    }

    if (isset($_GET['test'])) {
        $test = $_GET['test'];
    }

    if (!$engine || !$test) {
        echo '<h1>Template Engine Test Runner</h1>';
        echo '<p><strong>Usage</strong>: ' . $_SERVER['SCRIPT_NAME'] . '?engine=&lt;engine>&test=&lt;test></p>';

        $engines = scandir(__DIR__ . '/engines');
        $tests = scandir(__DIR__ . '/tests');

        echo '<h2>Engines</h2><ul>';
        foreach ($engines as $engine) {
            if (in_array($engine, array('.', '..', 'bootstrap.php'))) {
                continue;
            }

            echo '<li>' . $engine . '</li>';
        }
        echo '</ul>';

        echo '<h2>Tests</h2><ul>';
        foreach ($tests as $test) {
            if (in_array($test, array('.', '..', 'logic'))) {
                continue;
            }

            echo '<li>' . str_replace('.php', '', $test) . '</li>';
        }
        echo '</ul>';

        exit;
    }
}

$engineFile = __DIR__ . '/engines/' . $engine . '/' . $engine . '.php';
if (!file_exists($engineFile)) {
    echo '<h1>Template Engine Test Runner</h1>';
    echo '<p><strong>Error</strong>: Engine '. $engine . ' does not exists' . "\n";

    exit(1);
}

$testFile = __DIR__ . '/tests/' . $test . '.php';
if (!file_exists($testFile)) {
    echo '<h1>Template Engine Test Runner</h1>';
    echo '<p><strong>Error</strong>: Test '. $test . ' does not exists' . "\n";

    exit(1);
}

include $engineFile;
include $testFile;

try {
    render($template, $variables);
} catch (Exception $exception) {
    $e = $exception;

    if (!$isCli) {
        echo '<h1>Template Engine Test Runner</h1>';
        echo '<p><strong>Engine</strong>: ' . $engine . '<br>';
        echo '<strong>Test</strong>: ' . $test . '</p>';
    }

    do {
        if ($isCli) {
            echo $e->getMessage() . "\n";
            echo $e->getTraceAsString();
        } else {
            echo '<p><strong>' . $e->getMessage() . '</strong></p>';
            echo '<pre>' . $e->getTraceAsString() . '</pre>';
        }

        $e = $e->getPrevious();
        if ($e) {
            if ($isCli) {
                echo "\nCaused by:\n\n";
            } else {
                echo '<p>Caused by:</p>';
            }
        }
    } while ($e);
    exit(1);
}
