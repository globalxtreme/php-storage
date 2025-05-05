<?php

namespace GlobalXtreme\PHPStorage\Form;

class GXStorageMoveCopyForm
{
    public function __construct(
        protected string $file,
        protected int    $toClientId,
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

    public function setToClientId(int $toClientId): void
    {
        $this->toClientId = $toClientId;
    }

    public function getToClientId(): int
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
