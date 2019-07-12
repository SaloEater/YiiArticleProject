<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m190712_072958_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'text' => $this->text(),
            'created_at' => $this->integer(1),
            'updated_at' => $this->integer(11),
            'slug' => $this->string(64),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-article-created_by}}',
            '{{%article}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-created_by}}',
            '{{%article}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-article-updated_by}}',
            '{{%article}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-updated_by}}',
            '{{%article}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-created_by}}',
            '{{%article}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-article-created_by}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-updated_by}}',
            '{{%article}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-article-updated_by}}',
            '{{%article}}'
        );

        $this->dropTable('{{%article}}');
    }
}
