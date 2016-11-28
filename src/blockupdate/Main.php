<?php
namespace blockupdate;

use pocketmine\block\Block;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    private static $instance = null;

	  public function onEnable(){
			  $this->saveResource('config.yml');
			  self::$instance = $this;
				$this->bypassblocks = $this->getConfig()->get('Allow-Update');
		    $this->getServer()->getPluginManager()->registerEvents(new BlockUpdateListener(), $this);
				$this->getServer()->getLogger()->info('Enabled!');
	  }

		public static function getInstance(){
		    return self::$instance;
		}

		public function canBypass(Block $block){
        return in_array($block->getId(), $this->bypassblocks);
		}
}
