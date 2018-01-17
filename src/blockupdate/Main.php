<?php

namespace blockupdate;

use pocketmine\block\Block;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{

    private static $instance = null;
    private $bypassBlocks = [];
    private $blockLeaveDecay = true;

    public function onEnable(){
	$this->saveResource('config.yml');
	self::$instance = $this;
	$this->bypassBlocks = $this->getConfig()->get('Allow-Update');
        $this->blockLeaveDecay = $this->getConfig()->get('Block-Leave-Decay');
        $this->getServer()->getPluginManager()->registerEvents(new BlockUpdateListener(), $this);
	$this->getServer()->getLogger()->info("[BU] Enable!");
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
