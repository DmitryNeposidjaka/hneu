<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*', 'https://studyco-bc3e1.web.app'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => [
        'Content-Type',
        'X-Auth-Token',
        'Origin',
        'Authorization',
    ],
    'allowedMethods' => [
        'POST',
        'GET',
        'OPTIONS',
        'PUT',
        'PATCH',
        'DELETE',
    ],
    'exposedHeaders' => [
        'Cache-Control',
        'Content-Language',
        'Content-Type',
        'Expires',
        'Last-Modified',
        'Pragma',
    ],
    'maxAge' => 0,

];
