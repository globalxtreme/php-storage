<?php

namespace GlobalXtreme\PHPStorage\Contract;

use GlobalXtreme\PHPStorage\Support\GXStorageResponse;
use http\Encoding\Stream;

interface GXStorage
{
    /**
     * @param $path
     * @param $file
     * @param $title
     *
     * @return GXStorageResponse|null
     */
    public static function store($path, $file, $title = "");

    /**
     * @param $path
     *
     * @return GXStorageResponse|null
     */
    public static function delete($path);
}
