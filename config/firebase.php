<?php

return [
    'default' => env('FIREBASE_PROJECT', 'app'),

    'projects' => [
        'app' => [
            'credentials' => env('FIREBASE_CREDENTIALS'),
            'database_url' => env('FIREBASE_DATABASE_URL'),
            'storage_bucket' => env('FIREBASE_STORAGE_BUCKET'),
        ],
    ],
];

