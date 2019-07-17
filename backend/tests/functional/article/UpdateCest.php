<?php


use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class UpdateCest
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
            ],
            'article' => [
                'class' => \common\fixtures\ArticleFixture::class,
                'dataFile' => codecept_data_dir() . 'article_data.php'
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
    public function updateTest(FunctionalTester $I)
    {
        $I->amOnPage('/article/update?id=1');
        $I->fillField('input#article-name', 'Test name 2');
        $I->fillField('Text', 'Test text 2');
        $I->click('.btn-success');
        $I->see('Test name 2');
        $I->see('Test text 2');
    }
}