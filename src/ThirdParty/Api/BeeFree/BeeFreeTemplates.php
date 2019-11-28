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
 * Class BeeFreeTemplates
 * @package ThirdPartyResource\ThirdParty\Api\BeeFree
 */
class BeeFreeTemplates extends BaseApi
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
        $page = (int) $row['page'] ?? 1;
        $url = "/wp-json/v1/catalog/templates/?page={$page}&pagesize=10&context=free";
        return $this->client->get($this->url($url));
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------


}
