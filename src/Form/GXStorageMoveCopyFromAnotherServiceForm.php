<?php

namespace GlobalXtreme\PHPStorage\Form;

class GXStorageMoveCopyFromAnotherServiceForm
{
    public function __construct(
        protected string $file,
        protected int    $fromClientId,
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

    public function setFromClientId(int $fromClientId): void
    {
        $this->fromClientId = $fromClientId;
    }

    public function getFromClientId(): int
    {
        return $this->fromClientId;
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
