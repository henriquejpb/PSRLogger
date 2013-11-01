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

