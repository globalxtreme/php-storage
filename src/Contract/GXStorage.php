<?php

namespace GlobalXtreme\PHPStorage\Contract;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;
use http\Encoding\Stream;

interface GXStorage
{
    /**
     * @param GXStorageForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function store(GXStorageForm $form);

    /**
     * @param $path
     *
     * @return GXStorageResponse|null
     */
    public static function delete($path);

    /**
     * @return string
     */
    public static function notFoundLink();
}
