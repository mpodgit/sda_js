<?php

declare(strict_types=1);

namespace FileOperations;

class FileOperations
{
    const MODES = [
        'r', 'r+', 'w', 'w+', 'a', 'a+', 'x', 'x+', 'c', 'c+', 'e',
    ];

    private $fileName;
    private $fileHandle;

    public function __construct(string $fileName, string $mode)
    {
        $this->fileName = $fileName;
        $this->openFile($mode);
    }

    public function __destruct()
    {
        $this->closeFile();
    }

    public function read(): ?string
    {
        $line = fgets($this->fileHandle);
        return $line ?: null;
    }

    public function write(string $line)
    {
        return fwrite($this->fileHandle, $line);
    }

    private function openFile(string $mode)
    {
        if (!file_exists($this->fileName)) {
            throw new \Exception('Plik "' . $this->fileName . '" nie istnieje');
        }

        if (!in_array($mode, FileOperations::MODES)) {
            throw new \Exception('Niepoprawny tryb otwarcia pliku: "' . $mode . '"');
        }

        $this->fileHandle = fopen($this->fileName, $mode);
    }

    private function closeFile()
    {
        fclose($this->fileHandle);
    }
}












