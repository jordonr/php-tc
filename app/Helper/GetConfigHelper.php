<?php

namespace Helper;

class GetConfigHelper {

	private $configPath;
	private $env;
	private $file;

	function __construct($file = null) {
		$this->configPath = __DIR__ . "/../config/";
		$this->env = json_decode(file_get_contents($this->configPath . "env.json"), true);
		
		if(!is_null($file)) {
			$this->file = json_decode(file_get_contents($this->configPath . $file . ".json"), true);
		}
	}

	public function getKeyValue($key) {
		if (isset($this->file[$this->env['env']][$key])) {
			$value = $this->file[$this->env['env']][$key];
		} else if (isset($this->file['all'][$key])) {
			$value = $this->file['all'][$key];
		} else if (isset($this->env[$this->env['env']][$key])) {
			$value = $this->env[$this->env['env']][$key];
		} else {
			$value = $this->env['all'][$key];
		}

		return $value;
	}
}
