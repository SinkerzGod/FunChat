<?php

declare(strict_types=1);

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class FakeOpCommand extends Command implements PluginIdentifiableCommand{
	
	public function __construct(){
		parent::__construct("fakeop", "Fakingly op someone.", null, ["fo"]);
		$this->setPermission("funchat.commands.fakeop");
	}
	
	public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
		if(!$sender->hasPermission($this->getPermission())){
			$sender->sendMessage(TextFormat::RED . "No permission.");
			return false;
		}
		if(!isset($args[0])){
			$sender->sendMessage(TextFormat::RED . "Please enter the name of the player you want to fake op..");
			return false;
		}
		if(!($target = Loader::getInstance()->getServer()->getPlayer($args[0])) instanceof Player){
			$sender->sendMessage(TextFormat::RED . "Player not found.");
			return false;
		}
		$target->sendMessage(TextFormat::GRAY . "You are now op!");
		if($target->getName() !== $sender->getName()) $sender->sendMessage(TextFormat::GREEN . $target->getName() . " has received an invalid operator message: " . TextFormat::GRAY . "You are now op!");
		return true;
	}
	
	public function getPlugin() : Plugin{
		return Loader::getInstance();
	}
}