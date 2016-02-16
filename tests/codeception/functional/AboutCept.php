<?php

use tests\codeception\_pages\AboutPage;

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that about works');
AboutPage::openBy($I);
$I->seeResponseCodeIs(200);
$I->see('О НАС', 'div');
