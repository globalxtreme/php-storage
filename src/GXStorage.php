<?php

namespace GlobalXtreme\PHPStorage;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyFromAnotherServiceForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyToAnotherServiceForm;
use GlobalXtreme\PHPStorage\Form\GXStorageZIPForm;
use GlobalXtreme\PHPStorage\Support\GXStorageManager;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;


/**
 * @method static GXStorageResponse|null    store(GXStorageForm $form)
 * @method static GXStorageResponse|null    moveToAnotherService(GXStorageMoveCopyToAnotherServiceForm $form)
 * @method static GXStorageResponse|null    copyToAnotherService(GXStorageMoveCopyToAnotherServiceForm $form)
 * @method static GXStorageResponse|null    moveFromAnotherService(GXStorageMoveCopyFromAnotherServiceForm $form)
 * @method static GXStorageResponse|null    copyFromAnotherService(GXStorageMoveCopyFromAnotherServiceForm $form)
 * @method static GXStorageResponse|null    generateZIP(GXStorageZIPForm $form)
 * @method static GXStorageResponse|null    delete($path)
 * @method static string                    notFoundLink()
 *
 * @method static GXStorage   __set_state(array $array)
 *
 * </autodoc>
 */
class GXStorage implements Contract\GXStorage
{
    use GXStorageManager;
}
