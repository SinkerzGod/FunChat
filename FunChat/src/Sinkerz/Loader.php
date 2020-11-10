<?php

namespace Sinkerz;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\PluginLoader;
use pocketmine\Server;

class Loader extends PluginBase{

    public function onEnable(): void{
        $commands = [
            new MockCommand(), new FakeOpCommand(), new ShrugCommand(), new TableFlipCommand()
        ];
        foreach($commands as $command) $this->getServer()->getCommandMap()->registerAll("mock", $commands);
    }

    public function onDisable(): void{

    }

    public function onLoad(): void{

    }
}