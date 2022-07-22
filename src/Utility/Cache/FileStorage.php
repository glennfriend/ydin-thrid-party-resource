<?php

namespace ThirdPartyResource\Utility\Cache;

use Exception;

/**
 * @deprecated
 *
 * file storage
 *      - use Doctrine Cache
 *      - 不是使用 laravel cache
 *      - 無法經由 laravel 內建的指令刪除這些檔案
 *      - life time x is seconds
 *      - life time 0 is forever
 */
class FileStorage
{
    /**
     * @param string $key
     * @param string $value
     * @param bool|int $lifetime
     * @return bool
     */
    public function put(string $key, string $value, $lifetime = false)
    {
        return $this->_getCache()->save($key, $value, $lifetime);
    }

    /**
     * @param string $key
     * @return false|mixed
     */
    public function get(string $key)
    {
        return $this->_getCache()->fetch($key);
    }

    /**
     * 權得 cache file 的位置
     * for developer
     *
     * @param $key
     * @return mixed
     */
    public function guessFilename($key)
    {
        return $this->_getCache()->getGuessCacheFilename($key);
    }

    // --------------------------------------------------------------------------------
    //  private
    // --------------------------------------------------------------------------------

    /**
     * @return FileStorageCache
     */
    protected function _getCache()
    {
        static $cache;

        throw new Exception('not support FileStorageCache');

        if ($cache) {
            return $cache;
        }

        $cache = new FileStorageCache(storage_path('third-party-resource'));
        return $cache;
    }

}
