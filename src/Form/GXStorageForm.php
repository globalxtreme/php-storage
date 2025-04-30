<?php

namespace GlobalXtreme\PHPStorage\Form;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class GXStorageForm
{
    public function __construct(
        protected UploadedFile|string $file,
        protected string              $path,
        protected string|null         $originalName = null,
        protected string|null         $mimeType = null,
        protected int|null            $savedUntil = null,
        protected string|null         $title = null,
        protected string|int|null     $ownerId = null,
        protected string|null         $ownerType = null,
        protected bool                $withWatermark = false,
        protected string|null         $createdBy = null,
        protected string|null         $createdByName = null,
    )
    {
    }

    public function setFile(UploadedFile|string $file): void
    {
        $this->file = $file;
    }

    public function getFile(): UploadedFile|string
    {
        return $this->file;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setOriginalName(?string $originalName): void
    {
        $this->originalName = $originalName;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    public function getMimeType(): string|null
    {
        return $this->mimeType;
    }

    public function setSavedUntil(int $savedUntil): void
    {
        $this->savedUntil = $savedUntil;
    }

    public function getSavedUntil(): int|null
    {
        return $this->savedUntil;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setOwnerId(string|int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    public function getOwnerId(): string|int|null
    {
        return $this->ownerId;
    }

    public function setOwnerType(string $ownerType): void
    {
        $this->ownerType = $ownerType;
    }

    public function getOwnerType(): string|null
    {
        return $this->ownerType;
    }

    public function setWithWatermark(bool $withWatermark): void
    {
        $this->withWatermark = $withWatermark;
    }

    public function getWithWatermark(): bool
    {
        return $this->withWatermark;
    }

    public function setCreatedBy(string|int $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getCreatedBy(): string|null
    {
        return $this->createdBy;
    }

    public function setCreatedByName(string|int $createdByName): void
    {
        $this->createdByName = $createdByName;
    }

    public function getCreatedByName(): string|null
    {
        return $this->createdByName;
    }

}
