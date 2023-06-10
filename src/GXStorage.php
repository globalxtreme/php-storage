<?php

namespace GlobalXtreme\PHPStorage;

use GlobalXtreme\PHPStorage\Support\GXStorageManager;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;


/**
 * @method static GXStorageResponse|null    store($path, $file, $title = "")
 * @method static GXStorageResponse|null    delete($path)
 *
 * @method static GXStorage   __set_state(array $array)
 *
 * </autodoc>
 */
class GXStorage implements Contract\GXStorage
{
    use GXStorageManager;
}
