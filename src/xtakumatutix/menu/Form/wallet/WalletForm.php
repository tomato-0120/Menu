<?php

namespace xtakumatutix\menu\Form\wallet;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;
use xtakumatutix\menu\Form\wallet\PayForm;
use xtakumatutix\menu\Form\wallet\SeeForm;

Class WalletForm implements Form
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
            case 0:
            $player->sendForm(new PayForm($this->Main));
            break;

            case 1:
            $this->Main->getServer()->dispatchCommand($player, 'mymoney');
            break;

            case 2:
            $player->sendForm(new SeeForm($this->Main));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'KomuWallet',
            'content' => 'ボタンを押して操作してください',
            'buttons' => [
                [
                    'text' => '相手にお金をあげる'
                ],
                [
                    'text' => '自分の所持金を見る'
                ],
                [
                    'text' => '相手の所持金を見る'
                ]
            ],
        ];
    }
}