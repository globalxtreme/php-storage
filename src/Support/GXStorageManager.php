<?php

namespace GlobalXtreme\PHPStorage\Support;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
use GlobalXtreme\PHPStorage\Form\GXStorageMoveCopyForm;

trait GXStorageManager
{
    /**
     * @param GXStorageForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function store(GXStorageForm $form)
    {
        $client = new GXStorageClient();
        $store = $client->store($form);
        if (!$store) {
            return null;
        }

        $response = new GXStorageResponse();
        $response->setResponse($store);

        return $response;
    }

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function moveToAnotherService(GXStorageMoveCopyForm $form)
    {
        $client = new GXStorageClient();
        $move = $client->moveToAnotherService($form);
        if (!$move) {
            return null;
        }

        $response = new GXStorageResponse();
        $response->setResponse($move);

        return $response;
    }

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function copyToAnotherService(GXStorageMoveCopyForm $form)
    {
        $client = new GXStorageClient();
        $copy = $client->copyToAnotherService($form);
        if (!$copy) {
            return null;
        }

        $response = new GXStorageResponse();
        $response->setResponse($copy);

        return $response;
    }

    /**
     * @param $path
     *
     * @return GXStorageResponse|null
     */
    public static function delete($path)
    {
        $client = new GXStorageClient();
        $store = $client->delete($path);

        $response = new GXStorageResponse();
        $response->setResponse($store);

        return $response;
    }

    /**
     * @return string
     */
    public static function notFoundLink()
    {
        $link = isset($_ENV['STORAGE_BASE_URL']) ? $_ENV['STORAGE_BASE_URL'] : 'https://storage.globalxtreme-gateway.net';
        return $link . '/link/default/not-found.jpg';
    }
}
