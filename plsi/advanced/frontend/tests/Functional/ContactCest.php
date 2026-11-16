<?php

declare(strict_types=1);

namespace frontend\tests\Functional;

use frontend\tests\Support\FunctionalTester;

final class ContactCest
{
    public function _before(FunctionalTester $I): void
    {
        $I->amOnRoute('site/contact');
    }

    public function checkContact(FunctionalTester $I): void
    {
        $I->see('Contactos', 'h1');
    }

    public function checkContactSubmitNoData(FunctionalTester $I): void
    {
        $I->submitForm('#contact-form', []);
        $I->see('Contactos', 'h1');
        $I->seeValidationError('“Nome” não pode ficar em branco.');
        $I->seeValidationError('“E-mail” não pode ficar em branco.');
        $I->seeValidationError('“Assunto” não pode ficar em branco.');
        $I->seeValidationError('“Mensagem” não pode ficar em branco.');
        $I->seeValidationError('O código de verificação está incorreto.');
    }

    public function checkContactSubmitNotCorrectEmail(FunctionalTester $I): void
    {
        $I->submitForm(
            '#contact-form', 
            [
                'ContactForm[name]' => 'tester',
                'ContactForm[email]' => 'tester.email',
                'ContactForm[subject]' => 'test subject',
                'ContactForm[body]' => 'test content',
                'ContactForm[verifyCode]' => 'testme',
            ],
        );
        $I->seeValidationError('“E-mail” não é um endereço de e-mail válido.');
        $I->dontSeeValidationError('“Nome” não pode ficar em branco.');
        $I->dontSeeValidationError('“Assunto” não pode ficar em branco.');
        $I->dontSeeValidationError('“Mensagem” não pode ficar em branco.');
        $I->dontSeeValidationError('O código de verificação está incorreto.');
    }

    public function checkContactSubmitCorrectData(FunctionalTester $I): void
    {
        $I->submitForm(
            '#contact-form', 
            [
                'ContactForm[name]' => 'tester',
                'ContactForm[email]' => 'tester@example.com',
                'ContactForm[subject]' => 'test subject',
                'ContactForm[body]' => 'test content',
                'ContactForm[verifyCode]' => 'testme',
            ],
        );
        $I->seeEmailIsSent();
        $I->see('Obrigado por nos contactar. Responderemos assim que possível.');
    }
}
