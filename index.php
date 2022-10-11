<?php

$production = true;

if (\file_exists($envPath = __DIR__ . '/.env')) {
    $input = \fopen($envPath, 'r');

    while (! \feof($input)) {
        $kv = \explode('=', \fgets($input), 2);

        if (isset($kv[0]) && $kv[0] === 'APP_ENV') {
            $v = isset($kv[1]) ? \strtolower(\trim($kv[1])) : '';
            $production = $v === '' || $v === 'production';
            break;
        }
    }
}

if ($production) {
    return;
}

?><a href="./public/">./public/</a>
<br>
<a href="./public/login">./public/login</a>
