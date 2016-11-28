<?php

namespace blockupdate;

use blockupdate\Main;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\event\Listener;

class BlockUpdateListener implements Listener{
    /** @var BlockFreezer */
    private $plugin;
    /**
     * @param BlockFreezer $plugin
     */
    public function __construct(BlockUpdate $plugin){
        $this->plugin = $plugin;
    }
    /**
     * @param BlockUpdateEvent $event
     * @priority HIGHEST
     * @ignoreCancelled true
     */
    public function onBlockUpdate(BlockUpdateEvent $event){
	if($this->plugin->isStandstay($event->getBlock())){
	    $event->setCancelled(true);
	   }
    }
}