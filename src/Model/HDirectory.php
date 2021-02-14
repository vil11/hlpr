<?php

namespace HLPR\Model;

use HLPR\Exception\HException;

class HDirectory
{
    public const DS = '/';

    public const ABSENT_DIR_ERR = '%s -- dir is absent.';

    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     * @throws HException
     */
    public function getFilesList(): array
    {
        $this->checkDirExists();

        $files = [];
        foreach (scandir($this->path) as $contentElement) {
            if ($contentElement !== '.' && $contentElement !== '..') {
                if (is_file($this->path . self::DS . $contentElement)) {
                    $files[] = $contentElement;
                }
            }
        }

        return $files;
    }

    /**
     * @return array
     * @throws HException
     */
    public function getDirsList(): array
    {
        $this->checkDirExists();

        $dirs = [];
        foreach (scandir($this->path) as $contentElement) {
            if ($contentElement != '.' && $contentElement != '..') {
                if (is_dir($this->path . self::DS . $contentElement)) {
                    $dirs[] = $contentElement;
                }
            }
        }

        return $dirs;
    }

    /**
     * @throws HException
     */
    private function checkDirExists(): void
    {
        if (!is_dir($this->path)) {
            throw new HException(sprintf(self::ABSENT_DIR_ERR, $this->path));
        }
    }
}
