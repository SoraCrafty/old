<?php

namespace old\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;

use old\form\SettingForm;

class SettingCommand extends Command {

	private $plugin;

	public function __construct($plugin)
	{
		parent::__construct("setting","設定用フォーム","/setting");
		$this->plugin = $plugin;
	}

	public function execute(CommandSender $sender, string $label, array $args) 
	{
		if(!$sender->isOP()) return;
		$sender->sendForm(new SettingForm($this->plugin));
	}
}