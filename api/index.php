<?php

// Prepare writable storage directories in /tmp for Vercel Serverless environment
$tmpStorage = '/tmp/storage/framework/views';
if (!is_dir($tmpStorage)) {
    @mkdir($tmpStorage, 0755, true);
}

putenv('VIEW_COMPILED_PATH=' . $tmpStorage);
$_ENV['VIEW_COMPILED_PATH'] = $tmpStorage;
$_SERVER['VIEW_COMPILED_PATH'] = $tmpStorage;

putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';
$_SERVER['SESSION_DRIVER'] = 'cookie';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// Forward request to Laravel public index
require __DIR__ . '/../public/index.php';
