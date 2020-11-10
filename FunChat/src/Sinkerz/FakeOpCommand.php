<?php

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class FakeOpCommand extends Command{

    public function __construct(){
        parent::__construct("fakeop", "Fakingly op someone.", null, ["fo"]);
        $this->setPermission("funchat.commands.fakeop");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
        if (!$sender->hasPermission($this->getPermission())) {
            $sender->sendMessage(TextFormat::RED . "No permission.");
            return;
        }
        if (!isset($args[0])) {
            $sender->sendMessage(TextFormat::RED . "Please enter the name of the player you want to fake op..");
            return;
        }
        if (!$target = Server::getInstance()->getPlayer($args[0])) {
            $sender->sendMessage(TextFormat::RED . "Player not found.");
            return;
        }
        if ($target !== $sender) {
            $target->sendMessage(TextFormat::GRAY . "You are now op!");
            $sender->sendMessage(TextFormat::GREEN . $target->getName() . " has received an invalid operator message: " . TextFormat::GRAY . "You are now op!");
        } else {
            $target->sendMessage(TextFormat::GRAY . "You are now op!");
        }
    }
}