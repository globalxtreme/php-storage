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
        $response = new GXStorageResponse();

        $client = new GXStorageClient();
        $store = $client->store($form);
        if (!$store) {
            $response->setResponse();
        } else {
            $response->setResponse($store);
        }

        return $response;
    }

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function moveToAnotherService(GXStorageMoveCopyForm $form)
    {
        $response = new GXStorageResponse();

        $client = new GXStorageClient();
        $move = $client->moveToAnotherService($form);
        if (!$move) {
            $response->setResponse();
        } else {
            $response->setResponse($move);
        }

        return $response;
    }

    /**
     * @param GXStorageMoveCopyForm $form
     *
     * @return GXStorageResponse|null
     */
    public static function copyToAnotherService(GXStorageMoveCopyForm $form)
    {
        $response = new GXStorageResponse();

        $client = new GXStorageClient();
        $copy = $client->copyToAnotherService($form);
        if (!$copy) {
            $response->setResponse();
        } else {
            $response->setResponse($copy);
        }

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
        $delete = $client->delete($path);

        $response = new GXStorageResponse();
        $response->setResponse($delete);

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
