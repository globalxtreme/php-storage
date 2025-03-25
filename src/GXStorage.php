<?php

namespace GlobalXtreme\PHPStorage;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyForm;
use GlobalXtreme\PHPStorage\Support\GXStorageManager;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;


/**
 * @method static GXStorageResponse|null    store(GXStorageForm $form)
 * @method static GXStorageResponse|null    moveToAnotherService(GXStorageMoveCopyForm $form)
 * @method static GXStorageResponse|null    copyToAnotherService(GXStorageMoveCopyForm $form)
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
