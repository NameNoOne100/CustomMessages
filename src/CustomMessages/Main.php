<?php

  namespace CustomMessages;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\player\PlayerJoinEvent;
  use pocketmine\event\player\PlayerQuitEvent;

  class Main extends PluginBase implements Listener {

    public function onEnable() {

      $this->getServer()->getPluginManager()->registerEvents($this, $this);

      if(!(file_exists("CustomMessages/messages.txt"))) {

        @mkdir("CustomMessages/", 0777, true);
        touch("CustomMessages/messages.txt");
        file_put_contents("CustomMessages/messages.txt", "join-message: ");
        file_put_contents("CustomMessages/messages.txt", "quit-message: ", FILE_APPEND);

      }

    }

    public function onJoin(PlayerJoinEvent $event) {

      $player = $event->getPlayer();
      $player_name = $player->getName();
