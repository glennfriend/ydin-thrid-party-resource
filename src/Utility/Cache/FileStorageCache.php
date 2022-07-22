<?php

namespace ThirdPartyResource\Utility\Cache;

/**
 * @deprecated
 */
// class FileStorageCache extends \Doctrine\Common\Cache\FilesystemCache
class FileStorageCache
{
    /**
     * 猜測 cache file 的位置
     * 注意! 該功能在試驗中
     *
     * @param $key
     * @return string
     */
    public function getGuessCacheFilename($key)
    {
        throw new \Exception('not support getGuessCacheFilename');
        // $id = "[{$key}][1]";
        // return $this->getFilename($id);
    }

}
