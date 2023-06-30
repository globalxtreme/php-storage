<?php

namespace GlobalXtreme\PHPStorage\Support;

class GXStorageResponse
{
    /**
     * @var int|null
     */
    public $status = 500;

    /**
     * @var string|null
     */
    public $message = "An error occurred.";

    /**
     * @var string|null
     */
    public $internalMsg = "";

    /**
     * @var string|null
     */
    public $path = null;

    /**
     * @var string|null
     */
    public $fullPath = null;

    /**
     * @var string|null
     */
    public $mimeType = null;

    /**
     * @var string|null
     */
    public $title = null;

    /**
     * @var string|null
     */
    public $createdAt = null;


    /**
     * @param $response
     *
     * @return GXStorageResponse
     */
    public function setResponse($response)
    {
        if ($response) {
            if ($response['status']) {
                $this->status = $response['status']['code'] ?: 500;
                $this->message = $response['status']['message'] ?: "An error occurred.";
                $this->internalMsg = $response['status']['internalMsg'] ?: "";
            }

            $result = array_key_exists('result', $response) ? $response['result'] : null;
            if ($result && $this->status == 200) {
                $this->path = $result['path'] ?: null;
                $this->fullPath = $result['fullPath'] ?: null;
                $this->mimeType = $result['mimeType'] ?: null;
                $this->title = $result['title'] ?: null;
                $this->createdAt = $result['createdAt'] ?: null;
            }
        }

        return $this;
    }

}
