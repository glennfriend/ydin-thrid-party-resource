<?php

namespace ThirdPartyResource\ThirdParty\Api\BeeFree;

use Exception;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use ThirdPartyResource\ThirdParty\Api\BaseApi;
use ThirdPartyResource\ThirdParty\ApiBoard\GetData;
use ThirdPartyResource\ThirdParty\ApiBoard\GetDataCache;

/**
 * Class BeeFreeTemplate
 * @package ThirdPartyResource\ThirdParty\Api\BeeFree
 */
class BeeFreeTemplate extends BaseApi
{
    use GetData;
    use GetDataCache;

    /**
     * @var string
     */
    protected $configUrlName = 'beefree_url';

    /**
     *
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $row
     * @return ResponseInterface
     */
    public function getResponse(array $row = []): ResponseInterface
    {
        $uuid = $row['id'] ?? '';

        $url = "/wp-json/v1/catalog/templates/{$uuid}";
        return $this->client->get($this->url($url));
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------


}
