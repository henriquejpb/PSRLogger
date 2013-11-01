<?php
require_once 'src/autoload.php';

use Psr\Log\FileLogger;
use Application\Service\User as UserService;
use Application\Entity\User;

$logger = new FileLogger("log.log");
$service = new UserService($logger);

$userHenrique = new User('Henrique');
$userJose = new User('José');

$service->addUser($userHenrique);
$service->addUser($userJose);
$service->removeUser($userJose);

/* $logger->info("This is an info"); */
/* $logger->warning("This is a warning"); */
/* $logger->notice("This is a notice"); */
/* $logger->debug("This is a debug note"); */
/* $logger->emergency("This is an emergency"); */
/* $logger->critical("This is a critical error"); */
/* $logger->error(new Exception("foo")); */

