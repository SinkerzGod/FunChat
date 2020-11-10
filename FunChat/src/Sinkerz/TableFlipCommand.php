<?php

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class TableFlipCommand extends Command{

    public function __construct(){
        parent::__construct("tableflip", "Mock your message", null, []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "You are not a player.");
            return;
        }

        $sender->chat("(╯°□°）╯︵ ┻━┻");
    }

}