<?php

namespace Minifixio\onevsone\command;

use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\command\CommandSender;
use pocketmine\level\Location;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

use Minifixio\onevsone\utils\PluginUtils;
use Minifixio\onevsone\OneVsOne;
use Minifixio\onevsone\ArenaManager;

/**
 * Command to reference a new Arena in the pool 
 * @author Minifixio
 */
class ArenaCommand extends Command {

	private $plugin;
	private $arenaManager;
	public $commandName = "arena";
   private $pos1 = [];
   private $pos2 = [];

	public function __construct(OneVsOne $plugin, ArenaManager $arenaManager){
		parent::__construct($this->commandName, "Reference a new arena");
		$this->setUsage("/arena [1 | 2 | {name}]");
		$this->command = $this->commandName;
		$this->plugin = $plugin;
		$this->arenaManager = $arenaManager;
	}

	public function execute(CommandSender $sender, $label, array $params){
      //Is this necessary?
		if(!$this->plugin->isEnabled()){
			return false;
		}

        if(count($params) !== 1) {
          $sender->sendMessage(TextFormat::RED . $this->getUsage());
          return true;
      }

		if(!$sender instanceof Player){
			$sender->sendMessage("Please use the command in-game");
			return true;
		}
		
		if($sender->hasPermission("onevsone.arena")){

       switch(strtolower($params[0])) {

         case "1":
           $this->pos1[$sender->getName()] = [$sender->getX(), $sender->getY(), $sender->getZ(), $sender->getYaw(), $sender->getPitch(), $sender->getLevel()];
           $sender->sendMessage($this->prefix . TextFormat::GREEN . "First Spawn position set!");
           break;

         case "2":
           $this->pos2[$sender->getName()] = [$sender->getX(), $sender->getY(), $sender->getZ(), $sender->getYaw(), $sender->getPitch(), $sender->getLevel()];
           $sender->sendMessage($this->prefix 
. TextFormat::GREEN . "Second Spawn position set!");
           break;
         case "create":
           if(isset($this->pos1[$sender->getName()]) && isset($this->pos2[$sender->getName()])) {
             $pos1 = $this->pos1[$sender->getName()];
             $spawn1 = new Location($pos1[0], $pos1[1], $pos1[2], $pos1[3], $pos1[4], $pos1[5]);
             $pos2 = $this->pos2[$sender->getName()];
             $spawn2 = new Location($pos2[0], $pos2[1], $pos2[2], $pos2[3], $pos2[4], $pos2[5]);
             unset($this->pos1[$sender->getName()]);
             unset($this->pos2[$sender->getName()]);
             $this->arenaManager->referenceNewArena($spawn1, $spawn2);
             $sender->sendMessage($this->prefix . TextFormat::GREEN . "Arena successfully created!");
             break;
              }
           }
       } else {
         $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command");
             }
        }
    }