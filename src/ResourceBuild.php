<?php
declare(strict_types=1);

namespace ThirdPartyResource;

use ThirdPartyResource\ThirdParty\Api\BeeFree\BeeFree;
use ThirdPartyResource\ThirdParty\Api\FsTracking\FsTracking;
use ThirdPartyResource\ThirdParty\Api\Kidguard\Kidguard;

/**
 * resource build API
 */
class ResourceBuild
{
    public function beeFree(): BeeFree
    {
        return $this->factory(BeeFree::class);
    }

    public function fsTracking(): FsTracking
    {
        return $this->factory(FsTracking::class);
    }

    public function kidguard(): Kidguard
    {
        return $this->factory(Kidguard::class);
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
