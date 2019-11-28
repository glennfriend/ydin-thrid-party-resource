<?php

namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

use Exception;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use ThirdPartyResource\ThirdParty\Api\BaseApi;
use ThirdPartyResource\ThirdParty\ApiBoard\GetData;
use ThirdPartyResource\ThirdParty\ApiBoard\GetDataCache;

/**
 * Class KidguardProcessor
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class KidguardProcessor extends BaseApi
{
    use GetData;
    use GetDataCache;

    /**
     * @var string
     */
    protected $configUrlName = 'kidguard_url';

    /**
     *
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->client->get($this->url('/api/processors'));
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

}
