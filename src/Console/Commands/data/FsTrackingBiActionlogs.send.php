<?php

$id = 'test-1';

return [
    'action_type'       => 'chargeback',
    'subscription_id'   => $id,
    'email'             => 'test@kidguard.com',
    'timestamp'         => date('w'),
    'meta' => [
        'transaction_id'    => $id,
        'amount_in_cents'   => '3999',
    ],
];


/*
$id = 'test-2';

return [
    'action_type'       => 'dispute',
    'subscription_id'   => $id,
    'timestamp'         => date('w'),
    'meta' => [
        'transaction_id'    => $id,
        'amount_in_cents'   => '4999',
    ],
];
*/