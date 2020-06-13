<?php

namespace xtakumatutix\menu\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Form\type\NewsStoneForm;
use xtakumatutix\menu\Form\type\StatusForm;

Class MainForm implements Form
{

    public function __construct(Main $Main)
    { 
        $this->Main = $Main;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 1:
            $player->sendForm(new NewsForm());
            break;

            case 2:
            $player->sendForm(new InfoForm());
            break;

            case 3:
            $this->Main->getServer()->dispatchCommand($player, 'shop');
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'メニュー[Komuroid v.10]',
            'content' => '操作したいアプリをタップしてください',
            'buttons' => [
                [
                    'text' => '§cスリープモード',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/power',
                    ],
                ],
                [
                    'text' => 'News',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/news',
                    ],
                ],
                [
                    'text' => 'Info',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/info',
                    ],
                ],
                [
                    'text' => 'KomuZon :)',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/shop',
                    ],
                ],
                [
                    'text' => 'KomuWalet $',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/walet',
                    ],
                ],
                [
                    'text' => '同盟サーバー',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/server',
                    ],
                ],
            ],
        ];
    }
}