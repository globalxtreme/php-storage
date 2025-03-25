<?php

namespace GlobalXtreme\PHPStorage\Form;

class GXStorageMoveCopyForm
{
    public function __construct(
        protected string $file,
        protected string $toClientId,
        protected string $toPath,
    )
    {
    }

    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setToClientId(string $toClientId): void
    {
        $this->toClientId = $toClientId;
    }

    public function getToClientId(): string
    {
        return $this->toClientId;
    }

    public function setToPath(string $toPath): void
    {
        $this->toPath = $toPath;
    }

    public function getToPath(): string
    {
        return $this->toPath;
    }

}
