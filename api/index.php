<?php
echo "<h1>HELLO FROM VERCEL PHP!</h1>";
echo "<p>If you see this, PHP is working and Laravel is the problem.</p>";
exit;

    $storageDirs = [
        '/tmp/storage/app',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
    ];
    foreach ($storageDirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }

    // 2. Copy SQLite database to /tmp so it can be read/written without read-only errors
    $sourceDb = __DIR__ . '/../database/database.sqlite';
    $tmpDb = '/tmp/database.sqlite';
    if (!file_exists($tmpDb) && file_exists($sourceDb)) {
        copy($sourceDb, $tmpDb);
    }
    putenv('DB_DATABASE=' . $tmpDb);
    $_ENV['DB_DATABASE'] = $tmpDb;
    $_SERVER['DB_DATABASE'] = $tmpDb;

    // 3. Set standard Vercel environment overrides
    putenv('SESSION_DRIVER=cookie');
    $_ENV['SESSION_DRIVER'] = 'cookie';
    $_SERVER['SESSION_DRIVER'] = 'cookie';

    putenv('LOG_CHANNEL=stderr');
    $_ENV['LOG_CHANNEL'] = 'stderr';
    $_SERVER['LOG_CHANNEL'] = 'stderr';

    putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    $_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

    // Force debug mode
    putenv('APP_DEBUG=true');
    $_ENV['APP_DEBUG'] = true;
    $_SERVER['APP_DEBUG'] = true;

    // Forward request to Laravel public index
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<h1>Vercel Serverless PHP Crash</h1>";
    echo "<p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " on line " . $e->getLine() . "</p>";
    echo "<h2>Stack Trace:</h2>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

