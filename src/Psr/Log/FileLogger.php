<?php
namespace Psr\Log;

/**
 * Logs messages to a text-based log file.
 */
class FileLogger extends AbstractLogger
{
    /**
     * Path to the log file.
     *
     * @var string 
     */
    private $filePath;


    /**
     * @param string $filePath The path for the log file
     */
    public function __construct($filePath) 
    {
        if (!is_file($filePath) || !is_writable($filePath)) {
            throw new \InvalidArgumentException(
                "Path '{$filePath}' does not point to a writable file"
            );
        }

        $this->filePath = $filePath;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    public function outputLog($message) {
        $file = new \SplFileObject($this->filePath, 'a+');
        $file->fwrite($message);
    }
}
