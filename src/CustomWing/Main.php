<?php

namespace CustomWing;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Human;
use pocketmine\entity\Skin;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;
use pocketmine\permission\DefaultPermissions;
use pocketmine\player\Player;
use pocketmine\network\mcpe\JwtUtils;
use pocketmine\network\mcpe\JwtException;
use pocketmine\network\PacketHandlingException;
use pocketmine\network\mcpe\protocol\types\login\ClientData;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {
	
	/** @var self $instance */
    public static $instance;
    
    /** @var int*/
    public $json;
	
	public function onEnable(): void{
		self::$instance = $this;
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    	$this->checkSkin();
    	$this->checkRequirement();
    	$this->getLogger()->info($this->json . " Geometry Skin Confirmed");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($sender instanceof Player){
			if($cmd->getName() == "customwing"){
				$this->Form($sender, TextFormat::YELLOW . "Select Your Wings:");
				return true;
			}
		} else {
			$sender->sendMessage(TextFormat::RED . "You dont Have Permission to use this Command");
			return false;
		}
        return false;
	}
	
	public function dataReceiveEv(DataPacketReceiveEvent $ev)
    {
        $packet = $ev->getPacket();
        $player = $ev->getOrigin()->getPlayer();
        if ($packet instanceof LoginPacket) {
            $data = self::decodeClientData($packet->clientDataJwt);
            $name = $data->ThirdPartyName;
            if ($data->PersonaSkin) {
                if (!file_exists($this->getDataFolder() . "saveskin")) {
                    mkdir($this->getDataFolder() . "saveskin", 0777);
                }
                copy($this->getDataFolder()."steve.png",$this->getDataFolder() . "saveskin/{$name}.png");
                return;
            }
            if ($data->SkinImageHeight == 32) {
            }
            $saveSkin = new saveSkin();
            $saveSkin->saveSkin(base64_decode($data->SkinData, true), $name);
        }
    }
    
    public function onQuit(PlayerQuitEvent $ev)
    {
        $name = $ev->getPlayer()->getName();

        $willDelete = $this->getConfig()->getNested('DeleteSkinAfterQuitting');
        if ($willDelete) {
            if (file_exists($this->getDataFolder() . "saveskin/{$name}.png")) {
                unlink($this->getDataFolder() . "saveskin/{$name}.png");
            }
        }
    }
    
    public function Form($sender, string $txt){
    	$form = new SimpleForm(function (Player $sender, $data = null){
    		if($data === null){
    			return false;
    		}
    		switch($data){
    			case 0:
    			if($sender->hasPermission("kagune.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "kagune");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 1:
    			if($sender->hasPermission("kakuja.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "kakuja");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 2:
    			if($sender->hasPermission("mercy.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "mercy");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 3:
    			if($sender->hasPermission("balrog.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "balrog");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 4:
    			if($sender->hasPermission("blazingelectro.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "blazingelectro");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 5:
    			if($sender->hasPermission("darkaurora.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "darkaurora");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 6:
    			if($sender->hasPermission("davinci.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "davinci");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 7:
    			if($sender->hasPermission("devil.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "devil");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 8:
    			if($sender->hasPermission("diamond.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "diamond");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 9:
    			if($sender->hasPermission("legendarydragonknight.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "legendarydragonknight");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 10:
    			if($sender->hasPermission("monarchbutterfly.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "monarchbutterfly");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 11:
    			if($sender->hasPermission("razor.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "razor");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 12:
    			if($sender->hasPermission("robotic.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "robotic");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 13:
    			if($sender->hasPermission("angelred.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "AngelRed");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 14;
    			if($sender->hasPermission("angelkiller.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "AngelKiller");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 15:
    			if($sender->hasPermission("angelwhite.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "AngelWhite");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 16:
    			if($sender->hasPermission("angelblaze.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "AngleBlaze");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 17;
    			if($sender->hasPermission("enderdragon.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "EnderDragon");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 18:
    			if($sender->hasPermission("firedragon.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "FireDragon");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 19:
    			if($sender->hasPermission("poisondragon.wing") or $sender->hasPermission(DefaultPermissions::ROOT_OPERATOR)){

    			    $setskin = new setSkin();
    			    $setskin->setSkin($sender, "PoisonDragon");
    			  } else {
    			    $this->Form($sender, TextFormat::RED . "You dont have Permission to Use This Wing");
    			  }
    			break;
    			case 20:
    			  $this->resetSkin($sender);
    			break;
    			case 21:
    			break;
    		}
            return false;
    	});
    	$form->setTitle(TextFormat::RED . "Custom" . TextFormat::WHITE . "Wing");
    	$form->setContent($txt);
    	$form->addButton("§cKagune §4Kaneki");
    	$form->addButton("§0Kakuja §4Kaneki");
    	$form->addButton("§6Mercy §awing");
    	$form->addButton("§cBalrog §awing");
    	$form->addButton("§eBlazing §fElectro §awing");
    	$form->addButton("§5Dark §dPurple §awing");
    	$form->addButton("§6Da§fVinci §awing");
    	$form->addButton("§4Devil §awing");
    	$form->addButton("§bDiamond §awing");
    	$form->addButton("§cLegendary §4Dragon §fKnight");
    	$form->addButton("§bMonarch §cButter§dfly §awing");
    	$form->addButton("§eRazor §awing");
    	$form->addButton("§bRobo§3tic §awing");
    	$form->addButton("§cAngelRed §awing ");
    	$form->addButton("§cAngelKiller §awing");
    	$form->addButton("§fAngelWhite §awing");
    	$form->addButton("§gAngel§6Blaze §awing");
    	$form->addButton("§dEnder§5Dragon §awing");
    	$form->addButton("§cFire§5Dragon §awing");
    	$form->addButton("§2Poison§5Dragon §awing");
    	$form->addButton("Reset Skin");
    	$form->addButton("Exit");
    	$form->sendToPlayer($sender);
    	return $form;
    }
    
    public function resetSkin(Player $player){
      $player->sendMessage("Reset To Original Skin Successfully");
      $reset = new resetSkin();
      $reset->setSkin($player);
    }
    
    public function checkSkin(){
      $Available = [];
      if(!file_exists($this->getDataFolder() . "skin")){
        mkdir($this->getDataFolder() . "skin");
      }
      $path = $this->getDataFolder() . "skin/";
      $allskin = scandir($path);
      foreach($allskin as $file){
          array_push($Available, preg_replace("/.json/", "", $file));
      }
      foreach($Available as $value){
        if(!in_array($value . ".png", $allskin)){
          unset($Available[array_search($value, $Available)]);
        }
      }
      $this->json = count($Available);
      $Available = [];
    }
    
    public function checkRequirement(){
      if(!extension_loaded("gd")){
        $this->getServer()->getLogger()->info("§6Clothes: Uncomment gd2.dll (remove symbol ';' in ';extension=php_gd2.dll') in bin/php/php.ini to make the plugin working");
        $this->getServer()->getPluginManager()->disablePlugin($this);
      }
      if(!class_exists(SimpleForm::class)){
        $this->getServer()->getLogger()->info("§6Clothes: FormAPI class missing,pls use .phar from poggit!");
        $this->getServer()->getPluginManager()->disablePlugin($this);
        return;
      }
      if (!file_exists($this->getDataFolder() . "steve.png") || !file_exists($this->getDataFolder() . "steve.json") || !file_exists($this->getDataFolder() . "config.yml")) {
            if (file_exists(str_replace("config.yml", "", $this->getResources()["config.yml"]))) {
                $this->recurse_copy(str_replace("config.yml", "", $this->getResources()["config.yml"]), $this->getDataFolder());
            } else {
                $this->getServer()->getLogger()->info("§6Clothes: Something wrong with the resources");
                $this->getServer()->getPluginManager()->disablePlugin($this);
                return;
            }
      }
    }
    
    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public static function decodeClientData(string $clientDataJwt): ClientData{
        try{
            [, $clientDataClaims, ] = JwtUtils::parse($clientDataJwt);
        }catch(JwtException $e){
            throw PacketHandlingException::wrap($e);
        }

        $mapper = new \JsonMapper;
        $mapper->bEnforceMapType = false;
        $mapper->bExceptionOnMissingData = true;
        $mapper->bExceptionOnUndefinedProperty = true;
        try{
            $clientData = $mapper->map($clientDataClaims, new ClientData);
        }catch(\JsonMapper_Exception $e){
            throw PacketHandlingException::wrap($e);
        }
        return $clientData;
    }
}
