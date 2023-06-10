<?php

namespace GlobalXtreme\PHPStorage\Support;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;

class GXStorageClient
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $baseURL = "http://storage.globalxtreme-gateway.net/api";

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
        $this->clientId = isset($_ENV['STORAGE_CLIENT_ID']) ? $_ENV['STORAGE_CLIENT_ID'] : '';
        $this->clientSecret = isset($_ENV['STORAGE_CLIENT_SECRET']) ? $_ENV['STORAGE_CLIENT_SECRET'] : '';
    }


    public function store($path, $file, $title = "")
    {
        try {

            $options = $this->prepareHeader();
            $options['json'] = [
                'path' => $path,
                'file' => $file,
                'title' => $title,
            ];

            $response = $this->client->post("$this->baseURL/galleries", $options);

            // Set response body
            $body = json_decode($response->getBody(), true);
            if (!$body) {
                return null;
            }

            return $body;

        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
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

        } catch (\Exception $exception) {
            return null;
        }
    }


    /** --- SUB FUNCTIONS --- */

    public function prepareHeader()
    {
        return [
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'CLIENT-ID' => $this->clientId,
                'CLIENT-SECRET' => $this->clientSecret,
            ]
        ];
    }

}
