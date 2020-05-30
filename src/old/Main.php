<?php

namespace old;

use pocketmine\plugin\PluginBase;

use old\data\Data;

use pocketmine\Player;
use pocketmine\item\Item;

use old\command\SettingCommand;

class Main extends PluginBase {

	/*データ*/
	public $data;

	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this),$this);
		$this->getServer()->getCommandMap()->register("setting",new SettingCommand($this));
		$this->data = new Data($this);
		$this->setHungerForFood();
		$this->setHunger();
	}

	public function setHealth($player)
	{
		if($this->data->get('food') === false) return;

		switch($player->getInventory()->getItemInHand()->getId())
		{			/*1ハート = 4*/
			case 260: //apple
			$player->setHealth($player->getHealth() + 4);
			break;

			case 393: //BakedPotato
			$player->setHealth($player->getHealth() + 8);
			break;

			case 297: //bread
			$player->setHealth($player->getHealth() + 4);
			break;

			case 391: //carrot
			$player->setHealth($player->getHealth() + 4);
			break;

			case 364: //stake
			$player->setHealth($player->getHealth() + 8);
			break;

			case 360: //melon
			$player->setHealth($player->getHealth() + 2);
			break;
		}

	}

	public function setHunger()
	{
		if($this->data->get('run') === false) return;
		if($this->getServer()->getOnlinePlayers() >= 1){
			foreach($this->getServer()->getOnlinePlayers() as $players){
				$players->setFood(1);
			}
		}				

		$this->getScheduler()->scheduleDelayedTask(new Callback([$this,'setHunger'],[]), 20);
	}

	public function setHungerForFood()
	{
		if($this->data->get('food') === false) return;
		if($this->getServer()->getOnlinePlayers() >= 1){
			foreach($this->getServer()->getOnlinePlayers() as $players){
				$players->setFood(9);
			}
		}				

		$this->getScheduler()->scheduleDelayedTask(new Callback([$this,'setHungerForFood'],[]), 20);

	}

}