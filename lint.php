<?php

use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

define('LARAVEL_START', microtime(true));

require __DIR__ . '/vendor/autoload.php';

$phpPath = (new PhpExecutableFinder)->find();
$phpFiles = (new Finder)->files()->name('*.php')->in(__DIR__ . '/app');

foreach ($phpFiles as $file) {
    $process = new Process([
        $phpPath,
        '-l',
        $file->getRealPath(),
    ]);

    $process->run();

    if (!$process->isSuccessful()) {
        echo $process->getErrorOutput();
    }
}
