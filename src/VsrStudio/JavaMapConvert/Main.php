<?php

namespace VsrStudio\JavaMapConvert;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\scheduler\TaskScheduler;
use jojoe77777\FormAPI\CustomForm;
use VsrStudio\JavaMapConvert\tasks\ConvertTask;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->getLogger()->info("JavaMapConvert Has Been Activated!");
    }

    public function onDisable(): void {
        $this->getLogger()->info("JavaMapConvert Has Been Deactivated!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "convertmap") {
            if (count($args) < 2) {
                $sender->sendMessage("§cUsage: /convertmap <source_folder> <destination_folder>");
                return false;
            }

            $source = $args[0];
            $destination = $args[1];

            if (!is_dir($source)) {
                $sender->sendMessage("§cFolder Not Found!");
                return false;
            }

            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }

            $this->getScheduler()->scheduleAsyncTask(new ConvertTask($source, $destination, $this));
            $sender->sendMessage("§aKonversi sedang diproses di latar belakang...");
            return true;
        }

        if ($command->getName() === "convertmapform" && $sender instanceof Player) {
            $this->sendConversionForm($sender);
            return true;
        }

        return false;
    }

    public function sendConversionForm(Player $player): void {
        $form = new CustomForm(function (Player $player, ?array $data) {
            if ($data === null) {
                return;
            }

            [$source, $destination] = $data;

            if (!is_dir($source)) {
                $player->sendMessage("§cFolder Source Not Found!");
                return;
            }

            if (!is_dir($destination)) {
                mkdir($destination, 0777, true);
            }

            $this->getScheduler()->scheduleAsyncTask(new ConvertTask($source, $destination, $this));
            $player->sendMessage("§a Conversion Has Been Processed...");
        });

        $form->setTitle("JavaMapConvert");
        $form->addInput("Masukkan folder sumber:", "Contoh: /home/maps/java");
        $form->addInput("Masukkan folder tujuan:", "Contoh: /home/maps/bedrock");
        $player->sendForm($form);
    }
}
