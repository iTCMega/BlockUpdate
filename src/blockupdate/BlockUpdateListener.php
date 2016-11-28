<?php
namespace blockupdate;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\utils\Config;

class BlockUpdateListener implements Listener{

    /**
     * @param BlockUpdateEvent $event
     * @priority HIGHEST
     * @ignoreCancelled true
     */
    public function onBlockUpdate(BlockUpdateEvent $event){
	      if(!Main::getInstance()->canBypass($event->getBlock())){
	          $event->setCancelled();
	      }
    }
}