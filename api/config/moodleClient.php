<?php

return [
    'default_connection' => 'test',
    'connections' => [
        'test' => [
            'url' => env('MOODLE_CLIENT_URL', 'https://pns.hneu.edu.ua'),
            'token' => env('MOODLE_CLIENT_TOKEN', '2c0537be5b292d93cbfec2eedccc1c6a') // '0561a3ea928f3d1a459d110d6edfa1cd'
        ]
    ]
];