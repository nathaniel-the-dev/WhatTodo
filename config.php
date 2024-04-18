<?php

$envPath = './.env';
$envVariables = [];

if (file_exists($envPath) && is_readable($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $envVariables[$key] = trim($value);
    }
}

return [
    'database' => [
        'host' => $envVariables['DB_HOST'],
        'port' => $envVariables['DB_PORT'],
        'dbname' => $envVariables['DB_NAME'],
        'user' => $envVariables['DB_USER'],
        'password' => $envVariables['DB_PASSWORD'],
    ]
];