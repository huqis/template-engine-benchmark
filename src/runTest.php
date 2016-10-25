<?php

$engine = null;
$test = null;
$isCli = false;

// get input
if (isset($_SERVER['argv'][0])) {
    $isCli = true;

    if (isset($_SERVER['argv'][1])) {
        $engine = $_SERVER['argv'][1];
    }

    if (isset($_SERVER['argv'][2])) {
        $test = $_SERVER['argv'][2];
    }
} else {
    if (isset($_GET['engine'])) {
        $engine = $_GET['engine'];
    }

    if (isset($_GET['test'])) {
        $test = $_GET['test'];
    }
}

// show help screen on invalid input
if (!$engine || !$test) {
    if ($isCli) {
        echo 'Template Engine Test Runner' . "\n\n";
        echo 'Usage: php ' . $_SERVER['SCRIPT_NAME'] . ' <engine> <test>' . "\n\n";
    } else {
        echo '<h1>Template Engine Test Runner</h1>';
        echo '<p><strong>Usage</strong>: ' . $_SERVER['SCRIPT_NAME'] . '?engine=&lt;engine>&test=&lt;test></p>';
    }

    $engines = scandir(__DIR__ . '/engines');
    $tests = scandir(__DIR__ . '/tests');

    if ($isCli) {
        echo 'Engines' . "\n";
    } else {
        echo '<h2>Engines</h2><ul>';
    }

    foreach ($engines as $engine) {
        if (in_array($engine, array('.', '..', 'bootstrap.php'))) {
            continue;
        }

        if ($isCli) {
            echo '- ' . $engine . "\n";
        } else {
            echo '<li>' . $engine . '</li>';
        }
    }

    if ($isCli) {
        echo "\nTests\n";
    } else {
        echo '</ul><h2>Tests</h2><ul>';
    }

    foreach ($tests as $test) {
        if (in_array($test, array('.', '..', 'logic'))) {
            continue;
        }

        if ($isCli) {
            echo '- ' . str_replace('.php', '', $test) . "\n";
        } else {
            echo '<li>' . str_replace('.php', '', $test) . '</li>';
        }
    }

    if (!$isCli) {
        echo '</ul>';
    }

    exit(1);
}

// validate engine and test
$engineFile = __DIR__ . '/engines/' . $engine . '/' . $engine . '.php';
if (!file_exists($engineFile)) {
    if ($isCli) {
        echo 'Template Engine Test Runner' . "\n\n";
        echo 'Error: Engine '. $engine . ' does not exists' . "\n";
    } else {
        echo '<h1>Template Engine Test Runner</h1>';
        echo '<p><strong>Error</strong>: Engine '. $engine . ' does not exists</p>';
    }

    exit(1);
}

$testFile = __DIR__ . '/tests/' . $test . '.php';
if (!file_exists($testFile)) {
    if ($isCli) {
        echo 'Template Engine Test Runner' . "\n\n";
        echo 'Error: Test '. $test . ' does not exists' . "\n";
    } else {
        echo '<h1>Template Engine Test Runner</h1>';
        echo '<p><strong>Error</strong>: Test '. $test . ' does not exists</p>';
    }

    exit(1);
}

// run the test
try {
    include $engineFile;
    include $testFile;

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
