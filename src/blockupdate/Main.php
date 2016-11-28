<?php

namespace BlockUpdate;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;

use blockupdate\BlockUpdateListener;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getLogger()->info("BlockUpdate Enable!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
}