<?php

declare(strict_types=1);

namespace frontend\tests\Acceptance;

use frontend\tests\Support\AcceptanceTester;

final class HomeCest
{
    public function checkHome(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->see('Watertrack');

        $I->seeLink('A empresa');
        $I->click('A empresa');

        $I->see('Ajudamos a cuidar de cada gota.');
    }
}
