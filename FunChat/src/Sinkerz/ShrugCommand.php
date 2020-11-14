<?php

declare(strict_types=1);

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class ShrugCommand extends Command implements PluginIdentifiableCommand{
	
	public function __construct(){
		parent::__construct("shrug", "¯\_(ツ)_/¯", null, ["shruggie"]);
		$this->setPermission("funchat.commands.shrug");
	}
	
	public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
		if(!$sender instanceof Player){
			$sender->sendMessage(TextFormat::RED . "You are not a player.");
			return false;
		}
		if(!$sender->hasPermission($this->getPermission())){
			$sender->sendMessage(TextFormat::RED . "No permission.");
			return false;
		}
		$sender->chat("¯\_(ツ)_/¯");
		return true;
	}
	
	public function getPlugin() : Plugin{
		return Loader::getInstance();
	}
}