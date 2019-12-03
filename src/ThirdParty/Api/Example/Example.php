<?php

namespace ThirdPartyResource\ThirdParty\Api\Example;

/**
 * Class Example
 * @package ThirdPartyResource\ThirdParty\Api\Example
 */
class Example
{
    /**
     * @apiGroup Example
     * @apiName ☐
     * @api {GET} ThirdPartyResource example
     * @apiParamExample PHP Example
        use ThirdPartyResource\ResourceBuild;

        public function __construct(ResourceBuild $resourceBuild)
        {
            $this->resourceBuild = $resourceBuild;
        }

        public function example_1()
        {
            // one day = 86400 second
            $api = $this->resourceBuild->beeFree()->templates();
            $json = $api->getJsonCache($row, 86400);

            echo $json;
        }

        public function example_2(array $row)
        {
            $response = $api->send($row);
            $response = $api->getResponse($row);

            $text     = $api->getJson($row);
            $text     = $api->getJsonForever($row);
            $text     = $api->getJsonCache($row, $lifetime);

            $array    = $api->getArray($row);
            $array    = $api->getArrayForever($row);
            $array    = $api->getArrayCache($row, $lifetime);
        }
     *
     */
    public function example()
    {
    }

}
