<?php

namespace GlobalXtreme\PHPStorage\Contract;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyForm;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;

interface GXStorage
{
    /**
     * @param GXStorageForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function store(GXStorageForm $form);

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function moveToAnotherService(GXStorageMoveCopyForm $form);

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function copyToAnotherService(GXStorageMoveCopyForm $form);

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
