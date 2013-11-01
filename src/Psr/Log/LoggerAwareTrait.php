<?php
namespace Psr\Log;

/**
 * Describes a logger-aware instance implementation
 */
trait LoggerAwareTrait {
    /**
     * A logger instance.
     *
     * @var Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * Sets a logger instance on the object
     *
     * @param LoggerInterface $logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger) 
    {
        $this->logger = $logger;
    }

    /**
     * Gets the logger instance from the object
     *
     * @return Psr\Log\LoggerInterface
     */
    protected function getLogger() 
    {
        return $this->logger;
    }
}
