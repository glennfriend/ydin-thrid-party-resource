<?php

namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

use Psr\Http\Message\ResponseInterface;
use ThirdPartyResource\ThirdParty\Api\BaseApi;
use ThirdPartyResource\ThirdParty\Api\Kidguard\Library\Library;
use ThirdPartyResource\ThirdParty\ApiBoard\GetData;
use ThirdPartyResource\ThirdParty\ApiBoard\GetDataCache;

/**
 * Class KidguardUserUpsellTalkfamilySubscriptionOrders
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class KidguardUserUpsellTalkfamilySubscriptionOrders extends BaseApi
{
    use Library;
    use GetData;
    use GetDataCache;

    /**
     * @var string
     */
    protected $configUrlName = 'kidguard_url';

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @param array $row
     * @return ResponseInterface
     */
    protected function getResponse(array $row): ResponseInterface
    {
        $userId         = data_get($row, 'user_id')         ?? null;
        $subscriptionId = data_get($row, 'subscription_id') ?? null;

        return $this->getClient()->get("/api/cs/users/{$userId}/upsells/talkfamily/subscriptions/{$subscriptionId}/orders");
    }

}
