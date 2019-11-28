<?php
declare(strict_types = 1);
namespace ThirdPartyResource\ThirdParty\Api\Kidguard\Library;
use GuzzleHttp\Client;

/**
 * Trait Library
 */
trait Library
{

    public function getClient()
    {
        $use = config('third-party-resource.use');
        $authorization = config("third-party-resource.api.{$use}.kidguard_auth");

        $client = new Client([
            'base_uri' => $this->url(''),
            'headers' => [
                'Authorization' => $authorization,
                'Content-Type'  => 'application/json',
            ]
        ]);
        return $client;
    }

}
