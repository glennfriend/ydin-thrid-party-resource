<?php
declare(strict_types=1);

namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

/**
 * Class Kidguard
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class Kidguard
{
    /**
     * @apiGroup Kidguard
     * @apiName processor
     * @api {GET} $resourceBuild->kidguard()->processor()->getJson() processor
     */
    public function processor(): KidguardProcessor
    {
        return app(KidguardProcessor::class);
    }

    /**
     * @apiGroup Kidguard
     * @apiName transactions
     * @api {GET} $resourceBuild->kidguard()->transactions()->getJson() transactions
     * @apiParamExample Param Example
     *  [
     *      'gateway_transaction_id' => 1,
     *  ]
     */
    public function transactions(): KidguardTransactions
    {
        return app(KidguardTransactions::class);
    }

    /**
     * @apiGroup Kidguard
     * @apiName paymentProfiles
     * @api {GET} $resourceBuild->kidguard()->paymentProfiles()->getJson() paymentProfiles
     * @apiParamExample Param Example
     *  [
     *      'page' => 1,
     *      'card_type' => 'visa',
     *      'card_number' => '1111222233334444',
     *  ]
     */
    public function paymentProfiles(): KidguardPaymentProfiles
    {
        return app(KidguardPaymentProfiles::class);
    }

    /**
     * @apiGroup Kidguard
     * @apiName userUpsellTalkfamilySubscriptions
     * @api {GET} $resourceBuild->kidguard()->userUpsellTalkfamilySubscriptions()->getJson() userUpsellTalkfamilySubscriptions
     * @apiParamExample Param Example
     *  [
     *      'user_id' => (int) 1,
     *  ]
     */
    public function userUpsellTalkfamilySubscriptions(): KidguardUserUpsellTalkfamilySubscriptions
    {
        return app(KidguardUserUpsellTalkfamilySubscriptions::class);
    }

    /**
     * @apiGroup Kidguard
     * @apiName userUpsellTalkfamilySubscriptionOrders
     * @api {GET} $resourceBuild->kidguard()->userUpsellTalkfamilySubscriptionOrders()->getJson() userUpsellTalkfamilySubscriptionOrders
     * @apiParamExample Param Example
     *  [
     *      'user_id' => (int) 1,
     *      'subscription_id' => (int) 1,
     *  ]
     */
    public function userUpsellTalkfamilySubscriptionOrders(): KidguardUserUpsellTalkfamilySubscriptionOrders
    {
        return app(KidguardUserUpsellTalkfamilySubscriptionOrders::class);
    }
}
