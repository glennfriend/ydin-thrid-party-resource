<?php
namespace ThirdPartyResource\Utility\Cache;

use Doctrine\Common\Cache\FilesystemCache;

class FileStorageCache extends FilesystemCache
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
        $id = "[{$key}][1]";
        return $this->getFilename($id);
    }

}
