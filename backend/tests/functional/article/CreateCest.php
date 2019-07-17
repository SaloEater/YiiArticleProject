<?php


use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('login-button');
    }

    /**
     * @param FunctionalTester $I
     */
    public function createTest(FunctionalTester $I)
    {
        $I->amOnPage('/article/create/');
        $I->fillField('input#article-name', 'Test name');
        $I->fillField('Text', 'Test text');
        $I->click('.btn-success');
        $I->see('Test name');
        $I->see('Test text');
        $I->click('.btn-danger');
    }
}