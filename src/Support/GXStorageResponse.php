<?php

namespace GlobalXtreme\PHPStorage\Support;

class GXStorageResponse
{
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
     * @param $result
     *
     * @return GXStorageResponse
     */
    public function setResponse($result)
    {
        $this->path = $result->path ?: null;
        $this->fullPath = $result->fullPath ?: null;
        $this->mimeType = $result->mimeType ?: null;
        $this->title = $result->title ?: null;
        $this->createdAt = $result->createdAt ?: null;

        return $this;
    }

}
