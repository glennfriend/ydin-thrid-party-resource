<?php

namespace ThirdPartyResource\ThirdParty\Api\Fstracking;

/**
 * Class FsTracking
 * @package ThirdPartyResource\ThirdParty\Api\Fstracking
 */
class FsTracking
{
    /**
     * @return mixed
     */
    public function biActionlogs(): FsTrackingBiActionlogs
    {
        return app(FsTrackingBiActionlogs::class);
    }

}
