<?php

$local = [
    'beefree_url'   => 'https://beefree.io',
    'bi_url'        => 'http://127.0.0.1:8000',
    'kidguard_url'  => 'https://staging.kidguard.com',
    'kidguard_auth' => env('KIDGUARD_API_AUTHORIZATION'),
];

$staging = array_merge($local, [
    'bi_url'        => 'https://staging.bi.kidguard.com',
]);

$production = array_merge($local, [
    'bi_url'        => 'https://bi.kidguard.com',
    'kidguard_url'  => 'https://app.kidguard.com',
]);

return [

    /**
     * 要使用哪一組 API
     */
    'use' => env('THIRD_PARTY_RESOURCE_USE') ?? 'local',

    /**
     * 由 'use' 決定使用哪一組 API
     */
    'api' => [
        'local'      => $local,
        'staging'    => $staging,
        'production' => $production,
    ],

];
