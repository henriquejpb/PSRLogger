<?php
require_once 'src/autoload.php';

use Psr\Log\FileLogger;

$logger = new FileLogger("log.log");
$logger->error("foo");
$logger->error(new Exception("foo"));

