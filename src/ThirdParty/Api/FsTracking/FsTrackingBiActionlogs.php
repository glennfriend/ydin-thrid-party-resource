<?php

namespace ThirdPartyResource\ThirdParty\Api\FsTracking;

use Exception;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use ThirdPartyResource\ThirdParty\Api\BaseApi;

/**
 * Class FsTrackingBiActionlogs
 * @package ThirdPartyResource\ThirdParty\Api\FsTracking
 */
class FsTrackingBiActionlogs extends BaseApi
{
    /**
     * @var string
     */
    protected $configUrlName = 'bi_url';

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
    public function send(array $row): ResponseInterface
    {
        $options = [
            'json' => $row,
        ];
        return $this->client->post(
            $this->url('/api/bi/actionlogs'),
            $options
        );
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

}
