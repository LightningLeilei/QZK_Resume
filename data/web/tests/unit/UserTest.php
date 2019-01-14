<?php 
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
define("ROOT", __DIR__ . DS . '..' .  DS . '..' );
define("FROOT", ROOT . DS ."framework");
define("VIEW", FROOT . DS ."view");

include ROOT . DS . 'vendor' . DS .'autoload.php';

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $GLOBALS['User'] = 'Leilei';
        $this->assertEquals( g('User'), 'Leilei');
        $this->assertFalse( g('User1') );
    }

    public function testUserLogin()
    {
        $_REQUEST['email'] = 'lyx876@outlook.com';
        $_REQUEST['password'] = '459599';

        $user = new NewFrame\Controller\User();
        try
        {
            $user->login_check();
        }
        catch( Exception $e )
        {
            $this->assertEquals( "密码不能短于6个字符" , $e->getMessage() );
        }
    }
}