<?php

namespace KRUNCH7SHooT;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

class Main extends PluginBase implements Listener
{
	
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->saveResource("config.yml");
		$this->getLogger()->info("HelperUI by KRUNCH7SHooT Enable");
		if(!$this->getDescription()->getAuthors() === "KRUNCH7SHooT"){
			$this->getLogger()->critical("jangan ubah author kontol!");
			$this->getPluginLoader()->disablePlugin($this);
		}
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		switch($command->getName()){
			case "helperui":
			if($sender instanceof Player){
				$this->openForm($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
			} else {
				$sender->sendMessage("Please use this command in-game!");
			}
		break;
		
		}
		return true;
	}
	
	public function openForm($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->Info($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 1:
				$this->Rules($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 2:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 3:
				$this->StaffList($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 4
				break;
			}
		});
		$form->setTitle("§l§bHel§3per");
		$form->setContent("§aSelect Category §bHel§3per:");
		$form->addButton("§l§dIN§5FO\n§r§eTap to Open");
		$form->addButton("§l§dRUL§5ES\n§r§eTap to Open");
		$form->addButton("§l§dRANK §5INFO\n§r§eTap to Open");
		$form->addButton("§l§dSTAFF §5LIST\n§r§eTap to Open");
		$form->addButton("§l§cExit\§r§eTap to Exit");
		$form->sendToPlayer($sender);
	}
	
	public function Info($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->getServer()->getCommandMap()->dispatch($sender, "helperui");
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle("§l§eINFO");
		$form->setContent($this->getConfig()->get("content-info"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rules($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->getServer()->getCommandMap()->dispatch($sender, "helperui");
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle("§l§eRULES");
		$form->setContent($this->getConfig()->get("content-rules"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function RankInfo($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->Rank1($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 1:
				$this->Rank2($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 2:
				$this->Rank3($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 3:
				$this->Rank4($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 4:
				$this->Rank5($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
				case 5:
				$this->getServer()->getCommandMap()->dispatch($sender, "helperui");
				
			}
		});
		$form->setTitle("§l§eRANK INFO");
		$form->setContent("§dHubungi owner jika ingin membeli Rank: §e");
		$form->addButton("§l§b" . $this->getConfig()->get("rank1") . "\n§r§eTap to Open Rank " . $this->getConfig()->get("rank1"));
		$form->addButton("§l§b" . $this->getConfig()->get("rank2") . "\n§r§eTap to Open Rank " . $this->getConfig()->get("rank2"));
		$form->addButton("§l§b" . $this->getConfig()->get("rank3") . "\n§r§eTap to Open Rank " . $this->getConfig()->get("rank3"));
		$form->addButton("§l§b" . $this->getConfig()->get("rank4") . "\n§r§eTap to Open Rank " . $this->getConfig()->get("rank4"));
		$form->addButton("§l§b" . $this->getConfig()->get("rank5") . "\n§r§eTap to Open Rank " . $this->getConfig()->get("rank5"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rank1($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("rank1"));
		$form->setContent($this->getConfig()->get("content-rank1"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rank2($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("rank2"));
		$form->setContent($this->getConfig()->get("content-rank2"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rank3($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("rank3"));
		$form->setContent($this->getConfig()->get("content-rank3"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rank4($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("rank4"));
		$form->setContent($this->getConfig()->get("content-rank4"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function Rank5($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->RankInfo($sender);
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("rank5"));
		$form->setContent($this->getConfig()->get("content-rank5"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function StaffList($sender){
		$form = new SimpleForm(function (Player $sender, $data){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
				$this->getServer()->getCommandMap()->dispatch($sender, "helperui");
				$volume = mt_rand();
				$sender->getLevel()->broadcastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);
				break;
			}
		});
		$form->setTitle("§l§dSTAFF LIST");
		$form->setContent($this->getConfig()->get("content-stafflist"));
		$form->addButton("§l§cBack\n§r§eTap to Back");
		$form->sendToPlayer($sender);
	}
	
	public function onDisable(){
		$this->getLogger()->info("HelperUi by KRUNCH7SHooT Disabled");
	}
