<?php
namespace Application\Service;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;

class User {
    use LoggerAwareTrait;

    public function __construct(LoggerInterface $logger) {
        $this->setLogger($logger);
        $this->getLogger()->info("Started user service");
    }
}
