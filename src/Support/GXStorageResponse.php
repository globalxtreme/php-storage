<?php

namespace GlobalXtreme\PHPStorage\Support;

class GXStorageResponse
{
    /**
     * @var int|null
     */
    public $status = 200;

    /**
     * @var string|null
     */
    public $message = "";

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
        $status = json_encode($response['status']) ? ($response['status'] ?: null) : null;
        if ($status) {
            $this->status = $status['code'] ?: 500;
            $this->message = $status['message'] ?: "An error occurred.";
            $this->internalMsg = $status['internalMsg'] ?: "";
        }

        $result = json_encode($response['result']) ? ($response['result'] ?: null) : null;
        if ($result && $this->status == 200) {
            $this->path = $result['path'] ?: null;
            $this->fullPath = $result['fullPath'] ?: null;
            $this->mimeType = $result['mimeType'] ?: null;
            $this->title = $result['title'] ?: null;
            $this->createdAt = $result['createdAt'] ?: null;
        }

        return $this;
    }

}
