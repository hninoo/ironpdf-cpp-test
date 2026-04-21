<?php

namespace App\Libraries;

use RuntimeException;

class ContentLoader
{
    private readonly string $dataPath;

    public function __construct(?string $dataPath = null)
    {
        $this->dataPath = $dataPath ?? APPPATH . 'Data' . DIRECTORY_SEPARATOR;
    }

    public function load(string $filename): array
    {
        $path = $this->dataPath . $filename;

        if (! is_file($path)) {
            throw new RuntimeException("Content file not found: {$filename}");
        }

        $decoded = json_decode(file_get_contents($path), true);

        if (! is_array($decoded)) {
            throw new RuntimeException(
                "Invalid JSON in {$filename}: " . json_last_error_msg()
            );
        }

        return $decoded;
    }
}
