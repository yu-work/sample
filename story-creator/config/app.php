<?php

return [
    'name' => 'ストーリー作成アプリ',
    'env' => getenv('APP_ENV') ?: 'development',
    'debug' => getenv('APP_DEBUG') ?: true,
    'url' => getenv('APP_URL') ?: 'http://localhost:8000',
    'timezone' => 'Asia/Tokyo',
];
