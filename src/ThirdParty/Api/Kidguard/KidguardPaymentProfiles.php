<?php
declare(strict_types = 1);
namespace ThirdPartyResource\ThirdParty\Api\Kidguard;

use Exception;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;
use ThirdPartyResource\ThirdParty\Api\BaseApi;
use ThirdPartyResource\ThirdParty\Api\Kidguard\Library\Library;
use ThirdPartyResource\ThirdParty\ApiBoard\GetData;
use ThirdPartyResource\ThirdParty\ApiBoard\GetDataCache;

/**
 * Class KidguardPaymentProfiles
 * @package ThirdPartyResource\ThirdParty\Api\Kidguard
 */
class KidguardPaymentProfiles extends BaseApi
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
        $page       = data_get($row, 'page');
        $cardType   = data_get($row, 'card_type');
        $cardNumber = data_get($row, 'card_number');

        $options = [
            'query' => [
                'page' => $page,
                'size' => 100,
                'filters' => [
                    'card_type'   => $cardType,
                    'card_number' => $cardNumber,
                ],
            ],
        ];

        if (! $cardType) {
            unset($options['query']['filters']['card_type']);
        }

        return $this->getClient()->get('/api/cs/payment_profiles', $options);
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

}
