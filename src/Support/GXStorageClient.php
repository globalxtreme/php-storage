<?php

namespace GlobalXtreme\PHPStorage\Support;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GXStorageClient
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $baseURL = "https://storage.globalxtreme-gateway.net";

    /**
     * @var string
     */
    protected $clientId = "";

    /**
     * @var string
     */
    protected $clientSecret = "";


    /**
     * Set up base configuration
     */
    public function __construct()
    {
        $this->client = new Client();

        $this->baseURL = isset($_ENV['STORAGE_BASE_URL']) ? $_ENV['STORAGE_BASE_URL'] : $this->baseURL;
        $this->baseURL .= '/api';

        $this->clientId = isset($_ENV['STORAGE_CLIENT_ID']) ? $_ENV['STORAGE_CLIENT_ID'] : '';
        $this->clientSecret = isset($_ENV['STORAGE_CLIENT_SECRET']) ? $_ENV['STORAGE_CLIENT_SECRET'] : '';
    }


    public function store($path, $file, $title = "")
    {
        try {
            $isUploadedFile = $file instanceof UploadedFile;
            $options = $this->prepareHeader($isUploadedFile);

            if ($isUploadedFile) {
                $options['multipart'] = [
                    [
                        'name' => 'path',
                        'contents' => $path
                    ],
                    [
                        'name' => 'title',
                        'contents' => $title
                    ],
                    [
                        'name' => 'file',
                        'contents' => Utils::tryFopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName()
                    ],
                ];
            } else {
                $options['json'] = [
                    'path' => $path,
                    'file' => base64_encode($file),
                    'title' => $title,
                ];
            }

            $response = $this->client->post("$this->baseURL/galleries", $options);

            // Set response body
            $body = json_decode($response->getBody(), true);
            if (!$body) {
                return null;
            }

            return $body;

        } catch (BadResponseException $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    public function delete($path)
    {
        try {

            $options = $this->prepareHeader();
            $options['json'] = [
                'path' => $path,
            ];

            $response = $this->client->delete("$this->baseURL/galleries", $options);

            // Set response body
            $body = json_decode($response->getBody(), true);
            if (!$body) {
                return null;
            }

            return $body;

        } catch (BadResponseException $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }


    /** --- SUB FUNCTIONS --- */

    public function prepareHeader($isUploadedFile = null)
    {
        $contentType = [];
        if (!$isUploadedFile) {
            $contentType = ['Content-Type' => 'application/json'];
        }

        return [
            RequestOptions::HEADERS => [
                    'CLIENT-ID' => $this->clientId,
                    'CLIENT-SECRET' => $this->clientSecret,
                ] + $contentType
        ];
    }

}
