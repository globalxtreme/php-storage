<?php

namespace GlobalXtreme\PHPStorage\Support;

trait GXStorageManager
{
    /**
     * @param $path
     * @param $file
     * @param $title
     *
     * @return GXStorageResponse|null
     */
    public static function store($path, $file, $title = "")
    {
        $client = new GXStorageClient();
        $store = $client->store($path, $file, $title);
        if (!$store) {
            return null;
        }

        $response = new GXStorageResponse();
        $response->setResponse($store);

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
}
