<?php

namespace ThirdPartyResource\Utility\Cache;

use Exception;

/**
 * @deprecated
 *
 * 很單純的儲存資料到指定的地方
 *      - 沒有刪除檔案的功能, 但是可以覆蓋資料
 *      - 不使用 laravel cache
 *      - 無法經由 laravel 內建的指令刪除這些檔案
 */
class Storage
{

    /**
     * @param string $key
     * @param string $value
     */
    public function put(string $key, string $value)
    {
        static::_save($key, $value);
    }

    /**
     * @param string $key
     * @return bool|null|string
     */
    public function get(string $key)
    {
        return static::_load($key);
    }

    // --------------------------------------------------------------------------------
    //
    // --------------------------------------------------------------------------------

    /**
     * @param string $key
     * @return string
     * @throws Exception
     */
    protected function _buildFilename(string $key)
    {
        if (! preg_match('/^[a-zA-Z0-9_-]+$/', $key)) {
            throw new Exception('[third-party-resource] Storage Error: key-name does not meet the rules');
        }
        return (string) $key;
    }

    /**
     * @return string
     */
    protected function _getCacheFolderName()
    {
        return storage_path('third-party-resource');
    }

    /**
     *
     */
    /*
    protected function _setCacheFolderName($folderName)
    {
        if (! preg_match('/^[a-z0-9_-]+$/', $folderName)) {
            throw new Exception('Tool\\Storage Error: folder name');
        }
        $this->cacheFolderName = $folderName;
    }
    */

    /**
     * @param string $key
     * @param string $value
     * @return bool
     * @throws Exception
     */
    protected function _save(string $key, string $value)
    {
        $path = $this->_getCacheFolderName();
        if (! file_exists($path)) {
            mkdir($path);
        }
        if (! file_exists($path)) {
            throw new Exception('[third-party-resource] Storage Error: folder not exists');
        }

        $filename = $path . '/' . static::_buildFilename($key) . '.json';
        $result = file_put_contents($filename, $value);
        if (false === $result) {
            return false;
        }
        return true;
    }

    /**
     * @param string $key
     * @return bool|null|string
     */
    protected function _load(string $key)
    {
        $path = $this->_getCacheFolderName();
        $filename = $path . '/' . static::_buildFilename($key) . '.json';
        if (! file_exists($filename)) {
            return null;
        }

        return file_get_contents($filename);
    }

}
