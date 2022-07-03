<?php

use Illuminate\Support\Fluent;

require_once __DIR__.'/../vendor/autoload.php';

echo \sprintf('<!doctype html><script>%s</script>', \file_get_contents(
    __DIR__ . '/../vendor/cr/library/src/Avon/res/asset/unocss/runtime/full.global.js'
));

$template = new Fluent([
	'key' => 'value',
]);

include __DIR__ . '/../app/path-to.view.php';
