<?php

namespace old\form;

use old\Main;
use pocketmine\Player;
use pocketmine\form\Form;

class SettingForm implements Form {

	private $plugin;

	public function __construct($plugin)
	{
		$this->plugin = $plugin;

	}

	public function handleResponse($player,$data): void
	{
		if($data === null) return;

		switch($data[0])
		{
			case true:
			$this->plugin->data->setTrue('run');
			break;

			case false;
			$this->plugin->data->setFalse('run');
			break;

		}

		switch($data[1])
		{
			case true:
			$this->plugin->data->setTrue('food');
			break;

			case false:
			$this->plugin->data->setFalse('food');
			break;
		}

		$this->plugin->data->save();
		$this->plugin->setHunger();
		$this->plugin->setHungerForFood();
	}

	public function jsonSerialize()
	{
		return [

			'type' => 'custom_form',
            'title' => '設定用フォーム',
            'content' => [

            	[
            		'type' => 'toggle',
            	    'text' => '走れない機能'
			    ],
			    [
			    	'type' => 'toggle',
			        'text' => '直接回復できる機能',
			    ]
			]
		];
	}
}