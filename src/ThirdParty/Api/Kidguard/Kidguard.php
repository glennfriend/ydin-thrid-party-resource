<?php
declare(strict_types=1);

namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

/**
 * Class Kidguard
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class Kidguard
{
    public function processor(): KidguardProcessor
    {
        return app(KidguardProcessor::class);
    }

    public function transactions(): KidguardTransactions
    {
        return app(KidguardTransactions::class);
    }

    public function paymentProfiles(): KidguardPaymentProfiles
    {
        return app(KidguardPaymentProfiles::class);
    }

    public function userUpsellTalkfamilySubscriptions(): KidguardUserUpsellTalkfamilySubscriptions
    {
        return app(KidguardUserUpsellTalkfamilySubscriptions::class);
    }

    public function userUpsellTalkfamilySubscriptionOrders(): KidguardUserUpsellTalkfamilySubscriptionOrders
    {
        return app(KidguardUserUpsellTalkfamilySubscriptionOrders::class);
    }
}
