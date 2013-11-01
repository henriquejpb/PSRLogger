<?php
namespace Psr\Log;

/**
 * Dummy implementation of the LoggerInterface interface.
 *
 * It deliberately does nothing.
 */
class NullLogger extends AbstractLogger 
{

    /**
     * @{inherit-doc}
     */
    protected function outputLog($message) 
    {
        // do nothing
    }
}
