<?php
declare(strict_types = 1);
namespace ThirdPartyResource\ThirdParty\ApiBoard;

use ThirdPartyResource\Utility\Cache\FileStorage;

/**
 * feature
 *      - getJsonCache()
 *      - getJsonForever()
 *      - getArrayCache()
 *      - getArrayForever()
 *
 * required
 *      - Trait GetData
 *
 * Trait GetDataCache
 * @package ThirdPartyResource\ThirdParty\ApiBoard
 */
trait GetDataCache
{

    /**
     * 從 getReponse() 取得 body json string
     * feature
     *      - 什麼情況下會產生 cache
     *          - 如果有 lifetime 參數
     *          - 如果有取得資料
     *          - 如果 status code 為 200
     *          - 如果目前沒有 cache
     *      - 如果目前已有 cache, 將不會重新產生
     *      - 這些 cache 無關於 laravel cache
     *
     * @param array $row
     * @param int $lifetime
     * @return string
     */
    public function getJsonCache(array $row=[], int $lifetime): string
    {
        $key = $this->getClassKeyName($row);

        $json = $this->_storage()->get($key);
        if ($json) {
            return (string) $json;
        }

        list($json, $response) = $this->getJsonAndResponse($row);
        if ('200' == $response->getStatusCode()) {
            $this->_storage()->put($key, $json, $lifetime);
        }

        return $json;
    }

    /**
     * get array data, cache some second
     *
     * @param array $row
     * @param int $lifetime
     * @return array
     */
    public function getArrayCache(array $row=[], int $lifetime): array
    {
        $text = $this->getJsonCache($row, $lifetime);
        return json_decode($text, true);
    }

    /**
     * get json data, cache forever
     * 如果給永久一個時間, 我期許是 10 年
     *
     * @param array $row
     * @return string
     */
    public function getJsonForever(array $row=[]): string
    {
        // 315360000 = 10 year = 10 * 365 * 24*60*60
        $tenYearLifetime = 315360000;
        return $this->getJsonCache($row, $tenYearLifetime);
    }

    /**
     * get json array forever
     *
     * @return array
     */
    public function getArrayForever(array $row=[]): array
    {
        return json_decode($this->getJsonForever($row), true);
    }

    /**
     * 猜測 cache file
     *
     * @param array $row
     * @return mixed
     */
    public function guessCacheNameByKey(array $row)
    {
        $key = $this->getClassKeyName($row);

        return $this->_storage()->guessFilename($key);
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @param array $data
     * @return string
     */
    protected function _jsonEncodeFormat(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     * @return FileStorage
     */
    protected function _storage()
    {
        static $storage;

        if ($storage) {
            return $storage;
        }

        $storage = app(FileStorage::class);
        return $storage;
    }

}
