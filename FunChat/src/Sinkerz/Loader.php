<?php

declare(strict_types=1);

namespace Sinkerz;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
	
	/** @var self $instance */
	protected static $instance;
	
	public function onEnable() : void{
		self::$instance = $this;
		$this->getServer()->getCommandMap()->registerAll("mock", [
			new MockCommand(),
			new FakeOpCommand(),
			new ShrugCommand(),
			new TableFlipCommand()
		]);
	}
	
	public static function getInstance() : self{
		return self::$instance;
	}
}