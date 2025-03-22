<?php

namespace GlobalXtreme\PHPStorage\Support;

use GlobalXtreme\PHPStorage\Form\GXStorageForm;
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
        $this->baseURL .= '/api/public/v2/storages';

        $this->clientId = isset($_ENV['STORAGE_CLIENT_ID']) ? $_ENV['STORAGE_CLIENT_ID'] : '';
        $this->clientSecret = isset($_ENV['STORAGE_CLIENT_SECRET']) ? $_ENV['STORAGE_CLIENT_SECRET'] : '';
    }


    public function store(GXStorageForm $form)
    {
        try {
            $file = $form->getFile();

            $options = $this->prepareHeader();
            $options['multipart'] = [
                [
                    'name' => 'file',
                    'contents' => Utils::tryFopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName()
                ],
                [
                    'name' => 'path',
                    'contents' => $form->getPath()
                ],
                [
                    'name' => 'mimeType',
                    'contents' => $form->getMimeType()
                ],
                [
                    'name' => 'savedUntil',
                    'contents' => $form->getSavedUntil()
                ],
                [
                    'name' => 'title',
                    'contents' => $form->getTitle()
                ],
                [
                    'name' => 'ownerId',
                    'contents' => $form->getOwnerId()
                ],
                [
                    'name' => 'ownerType',
                    'contents' => $form->getOwnerType()
                ],
                [
                    'name' => 'createdBy',
                    'contents' => $form->getCreatedBy()
                ],
                [
                    'name' => 'createdByName',
                    'contents' => $form->getCreatedByName()
                ],
            ];

            $response = $this->client->post("$this->baseURL/files", $options);

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

            $response = $this->client->delete("$this->baseURL/files", $options);

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

    public function prepareHeader()
    {
        return [
            RequestOptions::HEADERS => [
                'CLIENT-ID' => $this->clientId,
                'CLIENT-SECRET' => $this->clientSecret,
            ]
        ];
    }

}
