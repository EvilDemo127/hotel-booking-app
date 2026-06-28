<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cloudinary Configuration URL
    |--------------------------------------------------------------------------
    */
    'cloud_url' => env('CLOUDINARY_URL'),
    
    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key'    => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ],

    'upload' => [
        'storage_path' => env('CLOUDINARY_STORAGE_PATH', storage_path('app')),
    ],
];
