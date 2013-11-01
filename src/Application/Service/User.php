<?php
namespace Application\Service;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Application\Entity\User as UserEntity;

class User 
{
    use LoggerAwareTrait;

    private $userStorage = array();

    public function __construct(LoggerInterface $logger) 
    {
        $this->setLogger($logger);
        $this->getLogger()->info("Started user service");
    }

    public function addUser(UserEntity $user) 
    {
        $this->getLogger()->info("Added user {0}", array($user->getName()));
        $this->userStorage[] = $user;
    }

    public function removeUser(UserEntity $user) 
    {
        foreach ($this->userStorage as $key => $stored) {
            if ($stored === $user) {
                $this->getLogger()->info("Removed user {0}", array($user->getName()));
                unset($this->userStorage[$key]);
                $this->userStorage = array_values($this->userStorage);
            }
        }
    }
}
