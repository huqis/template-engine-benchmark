<?php

$engines = [
    'frame',
    'haanga',
    'latte',
    'smarty',
    'twig',
];

$tests = [
    'empty',
    'loop-10',
    'loop-1000',
    'functions',
    'include',
    'include-dynamic',
    'include-arguments',
    'extends',
    'extends-dynamic',
];

if (!isset($_SERVER['argv'][0])) {
    echo "<h2>PHP Template Engine Benchmark</h2>";
    echo "<p>This benchmark should be run from the terminal.</p>";

    exit(1);
} elseif (!isset($_SERVER['argv'][1])) {
    echo "PHP Template Engine Benchmark\n\n";
    echo 'usage: php ' . $_SERVER['argv'][0] . ' <numRuns> [<engines> [<test>]]' . "\n";

    exit(1);
} else {
    $numRuns = $_SERVER['argv'][1];
}

if (isset($_SERVER['argv'][2])) {
    $engines = explode(',', str_replace(' ', '', $_SERVER['argv'][2]));
}

if (isset($_SERVER['argv'][3])) {
    $tests = explode(',', str_replace(' ', '', $_SERVER['argv'][3]));
}

echo "PHP Template Engine Benchmark\n\n";

$results = benchmarkEngines($engines, $tests, $numRuns);

echo "\n" . '# Results with uncompiled templates (' . $numRuns . ' runs)' . "\n\n";
echoEngineResult($engines, $results, 'no-cache');
echo "\n" . '# Results with compiled templates in cache (' . $numRuns . ' runs)' . "\n\n";
echoEngineResult($engines, $results, 'cache');

function benchmarkEngines(array $engines, array $tests, $numRuns) {
    $results = [];

    echo "Benchmarking engines (" . $numRuns . " runs):\n";

    foreach ($engines as $engine) {
        echo '- ' . $engine . "...\n";

        $results[$engine] = [];
        $results[$engine]['no-cache'] = runTests($engine, $tests, $numRuns, true);
        $results[$engine]['cache'] = runTests($engine, $tests, $numRuns, false);
    }

    return $results;
}

function runTests($engine, array $tests, $numRuns, $clearCache) {
    $results = [];

    foreach ($tests as $test) {
        $results[$test] = [
            'time' => [
                'min' => 999999,
                'max' => 0,
                'avg' => 0,
            ],
            'memory' => [
                'min' => 999999,
                'max' => 0,
                'avg' => 0,
            ],
        ];

        if (!$clearCache) {
            // increment the number of tests to run to make the first run
            // compile the templates
            $numRuns++;
        }

        for ($i = 0; $i < $numRuns; $i++) {
            if ($clearCache) {
                clearCache($engine);
            }

            $result = runTest($engine, $test);
            if ($result === false) {
                unset($results[$test]);

                continue 2;
            }

            if (!$clearCache && $i == 0) {
                // don't take first render in the result since the templates
                // needed to compile
                continue;
            }

            list($time, $memory) = $result;

            $results[$test]['time']['min'] = min($results[$test]['time']['min'], $time);
            $results[$test]['time']['max'] = max($results[$test]['time']['max'], $time);
            $results[$test]['time']['avg'] += $time;

            $results[$test]['memory']['min'] = min($results[$test]['memory']['min'], $memory);
            $results[$test]['memory']['max'] = max($results[$test]['memory']['max'], $memory);
            $results[$test]['memory']['avg'] += $memory;
        }

        if (!$clearCache) {
            // decrement the number of tests to have a correct average
            $numRuns--;
        }

        $results[$test]['time']['avg'] /= $numRuns;
        $results[$test]['memory']['avg'] /= $numRuns;
    }

    return $results;
}

function runTest($engine, $test) {
    $command = 'php ' . __DIR__ . '/runTest.php ' . $engine . ' ' .$test;
    $output = null;
    $code = null;

    $result = exec($command, $output, $code);

    if ($code != 0) {
        return false;
    }

    return explode(' ', $result);
}

function clearCache($engine) {
    exec('rm -rf ' . __DIR__ . '/engines/' . $engine . '/compile');
}

function getTestFile($engine, $test) {
    return __DIR__ . '/engines/' . $engine . '/tests/' . $test . '.php';
}

function echoEngineResult(array $engines, array $results, $group) {
    $columnSizes = [25, 10, 10, 10, 12, 12, 12];
    echoLineRow(7, $columnSizes);
    echoRow(array('engine', 'min time', 'max time', 'avg time', 'min mem', 'max mem', 'avg mem'), $columnSizes);
    echoLineRow(7, $columnSizes);

    foreach ($engines as $engine) {
        $engineRow = array(strtoupper($engine), '', '', '', '', '', '');
        echoRow($engineRow, $columnSizes);

        foreach ($results[$engine][$group] as $test => $testResult) {
            $testRow = [
                $test,
                formatTime($testResult['time']['min']),
                formatTime($testResult['time']['max']),
                formatTime($testResult['time']['avg']),
                formatBytes($testResult['memory']['min']),
                formatBytes($testResult['memory']['max']),
                formatBytes($testResult['memory']['avg']),
            ];

            echoRow($testRow, $columnSizes);
        }

        echoLineRow(7, $columnSizes);
    }
}

function echoLineRow($numRows, array $columnSizes = null) {
    $row = [];
    for ($i = 0; $i < $numRows; $i++) {
        $row[$i] = '----------------------------------------------------';
    }

    echoRow($row, $columnSizes);
}

function echoRow(array $row, array $columnSizes = null) {
    echo '| ';

    foreach ($row as $index => $cell) {
        if (isset($columnSizes[$index])) {
            $columnSize = $columnSizes[$index];
        } else {
            $columnSize = 20;
        }

        echo str_pad(substr($cell, 0, $columnSize), $columnSize);
        echo ' | ';
    }

    echo "\n";
}

function formatTime($time) {
    return (round($time * 1000000) / 1000) . ' ms';
}

function formatBytes($size) {
    if (!is_numeric($size) || $size < 0) {
        return $size;
    }

    if ($size == 0) {
        return '0 bytes';
    }

    $sizeUnits = [
        ' bytes',
        ' Kb',
        ' Mb',
        ' Gb',
        ' Tb',
        ' Pb',
        ' Eb',
        ' Zb',
        ' Yb',
    ];

    $i = floor(log($size, 1024));

    return round($size / pow(1024, $i), 2) . $sizeUnits[$i];
}
