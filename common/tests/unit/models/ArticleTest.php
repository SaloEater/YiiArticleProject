<?php


namespace common\tests\unit\models;


use Codeception\Test\Unit;
use common\fixtures\ArticlesTagsFixture;
use common\fixtures\CommentFixture;
use common\fixtures\TagFixture;
use common\fixtures\UserFixture;
use common\models\Article;
use common\models\User;

class ArticleTest extends Unit
{
    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
            'article' => [
                'class' => \common\fixtures\ArticleFixture::class,
                'dataFile' => codecept_data_dir() . 'article.php'
            ],
            'tag' => [
                'class' => TagFixture::class,
                'dataFile' => codecept_data_dir() . 'tag.php'
            ],
            'articles_tags' => [

                'class' => ArticlesTagsFixture::class,
                'dataFile' => codecept_data_dir() . 'articles_tags.php'
            ],
            'comment' => [
                'class' => CommentFixture::class,
                'dataFile' => codecept_data_dir() . 'comment.php'
            ]
        ];
    }

    public function testCreatedBy()
    {
        $article = Article::findOne(1);
        $this->assertEquals(1, $article->created_by);
        /**
         * @var $user User
         */
        $user = $article->createdBy;
        $this->assertNotNull($user);
        $this->assertEquals($article->created_by, $user->id);
    }

    public function testUpdatedBy()
    {
        $article = Article::findOne(1);
        $this->assertEquals(1, $article->updated_by);
        /**
         * @var $user User
         */
        $user = $article->updatedBy;
        $this->assertNotNull($user);
        $this->assertEquals($article->updated_by, $user->id);
    }

    public function testTags()
    {
        $article = Article::findOne(1);

        $tags = $article->tags;
        $this->assertCount(2, $tags);
    }

    public function testComments()
    {
        $article = Article::findOne(1);

        $tags = $article->comments;
        $this->assertCount(1, $tags);
    }

    public function testCreatedAt()
    {
        $article = Article::findOne(1);

        $time = $article->created_at;
        $this->assertNotNull($time);
    }

    public function testUpdatedAt()
    {
        $article = Article::findOne(1);

        $time = $article->updated_at;
        $this->assertNotNull($time);
    }

}