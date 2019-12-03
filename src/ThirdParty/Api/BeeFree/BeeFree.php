<?php

namespace ThirdPartyResource\ThirdParty\Api\BeeFree;

/**
 * Class BeeFree
 * @package ThirdPartyResource\ThirdParty\Api\BeeFree
 */
class BeeFree
{
    /**
     * @apiGroup BeeFree
     * @apiName template
     * @api {GET} $resourceBuild->beeFree()->template()->getJson() template
     * @apiParamExample Param Example
     *  [
     *      'id' => (string) '371',
     *  ]
     */
    public function template(): BeeFreeTemplate
    {
        return app(BeeFreeTemplate::class);
    }

    /**
     * @apiGroup BeeFree
     * @apiName templates
     * @api {GET} $resourceBuild->beeFree()->templates()->getJson() templates
     * @apiParamExample Param Example
     *  [
     *      'page' => (int) 1,
     *  );
     */
    public function templates(): BeeFreeTemplates
    {
        return app(BeeFreeTemplates::class);
    }
}
