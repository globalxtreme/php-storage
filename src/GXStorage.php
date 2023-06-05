<?php

namespace GlobalXtreme\PHPStorage;

use GlobalXtreme\PHPStorage\Support\GXStorageManager;
use GlobalXtreme\PHPStorage\Support\GXStorageResponse;


/**
 * @method static GXStorageResponse|null    store($path, $file)
 * @method static boolean                   delete($path)
 *
 * @method static GXStorage   __set_state(array $array)
 *
 * </autodoc>
 */
class GXStorage implements Contract\GXStorage
{
    use GXStorageManager;
}
