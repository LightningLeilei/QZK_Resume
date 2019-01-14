<?php 

class UserCest
{
    public function _before(AcceptanceTester $I)
    {
    }
    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnpage("_enter.php?m=user&a=login");
        $I->seeInTitle("用户登陆");
        $I->fillField('email','lyx876@outlook.com');
        $I->fillField('password','459599');
        $I->click("登陆");

    }
}
