<?php

namespace Danepowell\MutationExample;

use PHPUnit\Framework\TestCase;

final class WarTest extends TestCase
{
    /**
     * @covers \Danepowell\MutationExample\War::__construct
     *
     * @return void
     */
    public function testClassConstructor(): void
    {
        $war = new War('2', 'A');

        $this->assertSame('2', $war->card1);
        $this->assertSame('A', $war->card2);
    }

    /**
     * @covers       \Danepowell\MutationExample\War::getCardValue
     *
     * @dataProvider provideTestGetCardValue
     *
     * @param string $card
     * @param int $value
     *
     * @return void
     */
    public function testGetCardValue(string $card, int $value): void
    {
        $this->assertSame($value, War::getCardValue($card));
    }

    public static function provideTestGetCardValue(): array
    {
        return [
            ['2', 2],
            ['3', 3],
            ['4', 4],
            ['5', 5],
            ['6', 6],
            ['7', 7],
            ['8', 8],
            ['9', 9],
            ['10', 10],
            ['J', 11],
            ['Q', 12],
            ['K', 13],
            ['A', 14]
        ];
    }

    /**
     * @param $card1
     * @param $card2
     * @param $expectedWinner
     *
     * @dataProvider provideTestAnnounceWinner
     *
     * @covers \Danepowell\MutationExample\War::announceWinner
     * @return void
     */
    public function testAnnounceWinner($card1, $card2, $expectedWinner): void
    {
        $war = new War($card1, $card2);
        $this->assertSame($expectedWinner, $war->announceWinner());
    }

    public static function provideTestAnnounceWinner(): array
    {
        return [
            ['3', '2', 'Player 1 wins!'],
            ['2', '3', 'Player 2 wins!'],
            ['2', '2', 'It\'s a war!']
        ];
    }

    /**
     * @covers \Danepowell\MutationExample\War::repeatAnnounceWinner
     */
    public function testRepeatAnnounceWinner(): void
    {
        $war = new War('3', '2');
        $this->assertSame("Player 1 wins!\nPlayer 1 wins!\nPlayer 1 wins!\n", $war->repeatAnnounceWinner());
    }

    /**
     * @covers \Danepowell\MutationExample\War::repeatAnnounceWinnerWithSleep
     */
    public function testRepeatAnnounceWinnerWithSleep(): void
    {
        $war = new War('3', '2');
        $this->assertSame("Player 1 wins!\nPlayer 1 wins!\nPlayer 1 wins!\n", $war->repeatAnnounceWinnerWithSleep());
    }
}
