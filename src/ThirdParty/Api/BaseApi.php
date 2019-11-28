<?php
namespace ThirdPartyResource\ThirdParty\Api;

use Exception;
use Log;
use GuzzleHttp\Psr7\Response;

/**
 * Class BaseApi
 * @package ThirdPartyResource\ThirdParty\Api
 */
class BaseApi
{

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @param Response $response
     * @return bool
     */
    protected function isJsonFormat(Response $response): bool
    {
        $headerContent = var_export($response->getHeader('content-type'), true);

        if (false !== stristr($headerContent,'application/json')) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @param array $data
     * @return string
     */
    // protected function jsonEncodeFormat(array $data): string
    // {
    //     return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    // }

    /**
     * @param $url
     * @return string
     */
    protected function url($url): string
    {
        $configUrlName = $this->configUrlName;
        $use = config('third-party-resource.use');
        $baseUrl = config("third-party-resource.api.{$use}.{$configUrlName}");

        // debug only
        // $this->log('info', 'base url is ' . $baseUrl);

        if (! $baseUrl) {
            throw new Exception("ThirdParthResource Error: '{$configUrlName}' not setting");
        }

        return (rtrim($baseUrl, '/') . $url);
    }

    protected function log($type, $message)
    {
        $fullClassName = get_called_class();
        $tmp = explode("\\", $fullClassName);
        $className = $tmp[count($tmp)-1];
        Log::$type("{$className} - {$message}");
    }

    /**
     * 取得 class name 作為 prefix
     * 如果有參數, 經過 hash 之後, 作為 footer
     *
     * e.g.
     *      StripeApiGetUser-67ba2k54ft
     *
     * @param null $customKey
     * @param null $params
     * @return mixed|string
     */
    protected function getClassKeyName($params=null)
    {
        $classNames = explode('\\', static::class);
        $key = array_pop($classNames);

        if ($params) {
            $hashValue = hash('md5', var_export($params, true));
            $key .= '-' . $hashValue;
        }

        return $key;
    }

}
