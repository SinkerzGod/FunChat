<?php

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class MockCommand extends Command{

    public function __construct(){
        parent::__construct("mock", "Mock your message", null, []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "You are not a player.");
            return;
        }

        if(!isset($args[0])){
            $sender->sendMessage(TextFormat::RED . "Please enter what you want to mock.");
            return;
        }

        $message = implode(" ", $args);
        $sender->chat($this->mock($message));

    }

    private function mock(string $message): string{
        $uc = strtoupper($message);
        for($i = 0; $i < strlen($uc); $i += rand(0, 10)){
            $uc[$i] = strtolower($uc[$i]);
        }
        return $uc;
    }

}