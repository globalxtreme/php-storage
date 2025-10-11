<?php

namespace GlobalXtreme\PHPStorage\Contract;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyFromAnotherServiceForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyToAnotherServiceForm;
use GlobalXtreme\PHPStorage\Form\GXStorageZIPForm;
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
     * @param GXStorageMoveCopyToAnotherServiceForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function moveToAnotherService(GXStorageMoveCopyToAnotherServiceForm $form);

    /**
     * @param GXStorageMoveCopyToAnotherServiceForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function copyToAnotherService(GXStorageMoveCopyToAnotherServiceForm $form);

    /**
     * @param GXStorageMoveCopyFromAnotherServiceForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function moveFromAnotherService(GXStorageMoveCopyFromAnotherServiceForm $form);

    /**
     * @param GXStorageMoveCopyFromAnotherServiceForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function copyFromAnotherService(GXStorageMoveCopyFromAnotherServiceForm $form);

    /**
     * @param GXStorageZIPForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function generateZIP(GXStorageZIPForm $form);

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
