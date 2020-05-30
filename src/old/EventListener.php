<?php

namespace old;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemConsumeEvent;

class EventListener implements Listener {

	/*Mainオブジェクト*/
	private $plugin;

	public function __construct($plugin)
	{
		$this->plugin = $plugin;
	}

	public function onItemConsume(PlayerItemConsumeEvent $event)
	{
		$this->plugin->setHealth($event->getPlayer());
	}


}