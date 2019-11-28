<?php

namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

use Exception;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
use ThirdPartyResource\ThirdParty\Api\BaseApi;
use ThirdPartyResource\ThirdParty\Api\Kidguard\Library\Library;
use ThirdPartyResource\ThirdParty\ApiBoard\GetData;
use ThirdPartyResource\ThirdParty\ApiBoard\GetDataCache;

/**
 * Class KidguardTransactions
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class KidguardTransactions extends BaseApi
{
    use Library;
    use GetData;
    use GetDataCache;

    /**
     * @var string
     */
    protected $configUrlName = 'kidguard_url';

    /**
     * @param array $row
     * @return ResponseInterface
     */
    public function getResponse(array $row): ResponseInterface
    {
        $gatewayTransactionId = data_get($row, 'gateway_transaction_id') ?? null;

        $options = [
            'query' => [
                'page' => 1,
                'size' => 100,
                'filters' => [
                    'gateway_transaction_id' => $gatewayTransactionId,
                ],
            ],
        ];
        return $this->getClient()->get('/api/cs/transactions', $options);
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

}
