<?php

namespace ThirdPartyResource\Utility\Cache;

use Exception;
use Illuminate\Support\Facades\Cache;

/**
 * cache storage
 *      - 經由 laravel cache 運作
 *      - Cache lifetime is seconds (from illuminate/cache)
 */
class CacheStorage
{
    /**
     * @param string $key
     * @param string $value
     * @param bool|int $lifetime
     * @return bool
     */
    public function put(string $key, string $value, $lifetime = false)
    {
        return Cache::put($key, $value, $lifetime);
    }

    /**
     * @param string $key
     * @return false|mixed
     */
    public function get(string $key)
    {
        return Cache::get($key);
    }

    /**
     * @deprecated
     *
     * 權得 cache file 的位置
     * for developer
     *
     * @param $key
     * @return mixed
     */
    public function guessFilename($key)
    {
        throw new Exception('not support guessFilename()');
    }
}
