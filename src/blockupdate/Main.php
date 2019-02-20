<?php

declare(strict_types=1);

namespace blockupdate;

use pocketmine\block\Block;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

    private static $instance = null;
    private $bypassBlocks = []; //config array
    private $blockLeaveDecay = true; 

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
	self::$instance = $this;
        $this->bypassBlocks = $this->getConfig()->get("Allow-Update"); //Config array
        $this->blockLeaveDecay = $this->getConfig()->get("Block-Leave-Decay");
	$this->getServer()->getPluginManager()->registerEvents(new BlockUpdateListener(), $this);
        $this->getLogger()->info("Enabled!");
   }
	
   public static function getInstance(){
	return self::$instance;
   }
	
   public function canBypass(Block $block){
        return in_array($block->getId(), $this->bypassBlocks);
   }
	
   public function blockLeaveDecay(){
        return $this->blockLeaveDecay;
   }
}
