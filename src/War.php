<?php

namespace Danepowell\MutationExample;

class War
{
    public string $card1;
    public string $card2;

    /**
     * Cards can be numeric (2-10) or a face card (J, Q, K, A).
     */
    public function __construct(string $card1, string $card2)
    {
        $this->card1 = $card1;
        $this->card2 = $card2;
    }

    public static function getCardValue(string $card): int
    {
        if (!in_array($card, ['J', 'Q', 'K', 'A'])) {
            return $card;
        }
        return match ($card) {
            'J' => 11,
            'Q' => 12,
            'K' => 13,
            'A' => 14
        };
    }

    public function announceWinner(): string
    {
        $card1value = self::getCardValue($this->card1);
        $card2value = self::getCardValue($this->card2);
        if ($card1value > $card2value) {
            return "Player 1 wins!";
        }

        if ($card1value < $card2value) {
            return "Player 2 wins!";
        }

        return "It's a war!";
    }

    public function repeatAnnounceWinner(): string
    {
        $winner = '';
        for ($i = 0; $i < 3; $i++) {
            $winner .= $this->announceWinner() . "\n";
        }
        return $winner;
    }

    public function repeatAnnounceWinnerWithSleep(): string
    {
        $winner = '';
        for ($i = 0; $i < 3; $i++) {
            sleep(1);
            $winner .= $this->announceWinner() . "\n";
        }
        return $winner;
    }
}
