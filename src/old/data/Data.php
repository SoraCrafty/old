<?php

namespace old\data;

use pocketmine\utils\Config;

class Data extends Config {

	/*Mainオブジェクト*/
	private $plugin;

	public function __construct($plugin)
	{
		$this->plugin = $plugin;
		parent::__construct($this->plugin->getDataFolder() . "Data.yml", Config::YAML);
		if (!(file_exists($this->plugin->getDataFolder()))) @mkdir($this->plugin->getDataFolder(), 0777);
		new Config($this->plugin->getDataFolder()."data.yml",Config::YAML,array(
			'run' => false,
			'food' => false,
		));
	}

	public function setTrue($data)
	{
		$this->set($data,true);
	}

	public function setFalse($data)
	{
		$this->set($data,false);
	}
}