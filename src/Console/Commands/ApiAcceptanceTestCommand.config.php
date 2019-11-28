<?php
use ThirdPartyResource\ThirdParty\Api\BeeFree;
use ThirdPartyResource\ThirdParty\Api\FsTracking;
use ThirdPartyResource\ThirdParty\Api\Kidguard;

return [
    // BeeFree
    [
        'class'  => BeeFree\BeeFreeTemplates::class,
        'method' => 'getJson',
    ],
    [
        'class'  => BeeFree\BeeFreeTemplates::class,
        'method' => 'getJsonForever',
    ],
    // FsTracking
    [
        'class'  => FsTracking\FsTrackingBiActionlogs::class,
        'method' => 'send',
    ],
    // Kidguard
    [
        'class'  => Kidguard\KidguardProcessor::class,
        'method' => 'getJson',
    ],
    [
        'class'  => Kidguard\KidguardProcessor::class,
        'method' => 'getArrayForever',
    ],
    [
        'class'  => Kidguard\KidguardTransactions::class,
        'method' => 'getResponse',
    ],
    [
        'class'  => Kidguard\KidguardTransactions::class,
        'method' => 'getArrayForever',
    ],
    [
        'class'  => Kidguard\KidguardPaymentProfiles::class,
        'method' => 'getArray',
    ],
    [
        'class'  => Kidguard\KidguardPaymentProfiles::class,
        'method' => 'getArrayForever',
    ],
    [
        'class'  => Kidguard\KidguardUserUpsellTalkfamilySubscriptions::class,
        'method' => 'getArrayForever',
    ],
    [
        'class'  => Kidguard\KidguardUserUpsellTalkfamilySubscriptionOrders::class,
        'method' => 'getArrayForever',
    ],

];
