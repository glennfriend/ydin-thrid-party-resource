<?php

namespace ThirdPartyResource\ThirdParty\Api\BeeFree;

/**
 * Class BeeFree
 * @package ThirdPartyResource\ThirdParty\Api\BeeFree
 */
class BeeFree
{
    public function template(): BeeFreeTemplate
    {
        return app(BeeFreeTemplate::class);
    }

    public function templates(): BeeFreeTemplates
    {
        return app(BeeFreeTemplates::class);
    }
}
