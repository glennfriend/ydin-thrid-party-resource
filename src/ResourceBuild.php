<?php
declare(strict_types=1);

namespace ThirdPartyResource;

use ThirdPartyResource\ThirdParty\Api\BeeFree\BeeFreeTemplates;
use ThirdPartyResource\ThirdParty\Api\FsTracking\FsTrackingBiActionlogs;
use ThirdPartyResource\ThirdParty\Api\Kidguard\KidguardProcessor;
use ThirdPartyResource\ThirdParty\Api\Kidguard\KidguardTransactions;
use ThirdPartyResource\ThirdParty\Api\Kidguard\KidguardPaymentProfiles;
use ThirdPartyResource\ThirdParty\Api\Kidguard\KidguardUserUpsellTalkfamilySubscriptions;
use ThirdPartyResource\ThirdParty\Api\Kidguard\KidguardUserUpsellTalkfamilySubscriptionOrders;

/**
 * resource build API
 */
class ResourceBuild
{
    public function beeFreeTemplates()
    {
        return $this->factory(BeeFreeTemplates::class);
    }

    public function fsTrackingBiActionlogs()
    {
        return $this->factory(FsTrackingBiActionlogs::class);
    }

    public function kidguardProcessor()
    {
        return $this->factory(KidguardProcessor::class);
    }

    public function kidguardTransactions()
    {
        return $this->factory(KidguardTransactions::class);
    }

    public function kidguardPaymentProfiles()
    {
        return $this->factory(KidguardPaymentProfiles::class);
    }

    public function kidguardUserUpsellTalkfamilySubscriptions()
    {
        return $this->factory(KidguardUserUpsellTalkfamilySubscriptions::class);
    }

    public function kidguardUserUpsellTalkfamilySubscriptionOrders()
    {
        return $this->factory(KidguardUserUpsellTalkfamilySubscriptionOrders::class);
    }


    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @param string $className
     * @return mixed
     */
    protected function factory(string $className)
    {
        return app($className);
    }

}
