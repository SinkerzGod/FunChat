<?php

declare(strict_types=1);

namespace Sinkerz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use function implode;
use function rand;
use function strlen;
use function strtolower;
use function strtoupper;
use function strval;

class MockCommand extends Command implements PluginIdentifiableCommand{
	
	public function __construct(){
		parent::__construct("mock", "Mock your message", null, []);
		$this->setPermission("funchat.commands.mock");
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
		if(!isset($args[0])){
			$sender->sendMessage(TextFormat::RED . "Please enter what you want to mock.");
			return false;
		}
		$message = implode(" ", $args);
		$message = strtoupper($message);
		for($i = 0; $i < strlen($message); $i += rand(0, 10)){
			$message[$i] = strtolower($message[$i]);
		}
		$sender->chat(strval($message));
		return true;
	}
	
	public function getPlugin() : Plugin{
		return Loader::getInstance();
	}
}