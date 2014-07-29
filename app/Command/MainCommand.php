<?php

namespace Command;

use Helper\GetConfigHelper;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MainCommand {

    private $config;
    private $logger;

    function __construct() {

	$this->config = new GetConfigHelper();
	$this->logger = new Logger('app_logger');

	$logpath = dirname(__FILE__) . "/../" . $this->config->getKeyValue('logpath');

	if(!file_exists($logpath)) {
		$logdir = dirname($logpath);
		if(!file_exists($logdir)) {
			mkdir($logdir, 0770, true);
		}
	}

	$this->logger->pushHandler(new StreamHandler($logpath, Logger::DEBUG));
    }

    public function start() {

	$this->logger->addInfo('Starting Application');
	echo "Hello World!\n";	
    }
}
