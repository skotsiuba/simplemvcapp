<?php

namespace App;

use Psr\Log\AbstractLogger;

/**
 * Class Logger
 * @package App
 */
class Logger extends AbstractLogger
{
    protected $logsFile = __DIR__ . '/../logs/logger.log';

    /**
     * @param mixed string
     * @param object $message
     * @param array $context
     */
    public function log($level, $message, array $context = [])
    {
        $text = $level . ' | ';
        $text .= date('Y-m-d H:i:s');
        $text .= ' File: ' . $message->getFile();
        $text .= ' Line: ' . $message->getLine();
        $text .= ' Description: ' . $message->getMessage();

        file_put_contents($this->logsFile, $text . PHP_EOL, FILE_APPEND);
    }
}
