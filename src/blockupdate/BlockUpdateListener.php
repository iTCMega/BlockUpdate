<?php

declare(strict_types=1);

namespace blockupdate;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\event\block\LeavesDecayEvent;
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

    public function onLeaveDecay(LeavesDecayEvent $event){
        if(Main::getInstance()->blockLeaveDecay()){
            $event->setCancelled();
        }
    }
}
