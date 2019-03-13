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
    public function tryToTest_Login(AcceptanceTester $I)
    {
        $I->amOnpage("index.php?m=user&a=login");
        $I->seeInTitle("用户登陆");
        $I->fillField('email','123456@outlook.com');
        $I->fillField('password','000000000');
        $I->click("登陆");
    }
    // public function tryToTest_CreateResume(AcceptanceTester $I)
    // {
    
    // }
}
