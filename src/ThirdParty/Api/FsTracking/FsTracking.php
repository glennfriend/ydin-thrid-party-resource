<?php

namespace ThirdPartyResource\ThirdParty\Api\Fstracking;

/**
 * Class FsTracking
 * @package ThirdPartyResource\ThirdParty\Api\Fstracking
 */
class FsTracking
{
    /**
     * @apiGroup FsTracking
     * @apiName biActionlogs
     * @api {GET} $resourceBuild->kidguard()->biActionlogs()->send() biActionlogs
     * @apiParamExample Request Example
        [
            'action_type'       => 'chargeback',
            'subscription_id'   => 'test-1',
            'email'             => 'test@kidguard.com',
            'timestamp'         => date('w'),
            'meta' => [
                'transaction_id'    => 'test-1',
                'amount_in_cents'   => '3999',
            ],
        ]
     */
    public function biActionlogs(): FsTrackingBiActionlogs
    {
        return app(FsTrackingBiActionlogs::class);
    }

}
