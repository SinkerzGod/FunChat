<?php

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class ShrugCommand extends Command{

    public function __construct(){
        parent::__construct("shrug", "¯\_(ツ)_/¯", null, ["shruggie"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
        if(!$sender instanceof Player){
            return;
        }
        $sender->chat("¯\_(ツ)_/¯");
    }
}