<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $created_at
 * @property int $updated_at
 * @property string $slug
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ArticlesTags[] $articlesTags
 * @property Tag[] $tags
 * @property Comment[] $comments
 * @property User $createdBy
 * @property User $updatedBy
 * @property string $createdAt
 * @property string $updatedAt
 */
class Article extends \yii\db\ActiveRecord
{

    function behaviors()
    {
        return
        [
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true
            ],
            'class' => BlameableBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesTags()
    {
        return $this->hasMany(ArticlesTags::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('articles_tags', ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return date('Y-F-d H:i', $this->created_at);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return date('Y-F-d H:i', $this->updated_at);
    }
}
