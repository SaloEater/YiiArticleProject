<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%article}}`
 */
class m190710_101235_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'article_id' => $this->integer(),
            'text' => $this->text()->append('CHARACTER SET utf8 COLLATE utf8_general_ci'),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-created_by}}',
            '{{%comment}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-comment-article_id}}',
            '{{%comment}}',
            'article_id'
        );

        // add foreign key for table `{{%article}}`
        $this->addForeignKey(
            '{{%fk-comment-article_id}}',
            '{{%comment}}',
            'article_id',
            '{{%article}}',
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
            '{{%fk-comment-created_by}}',
            '{{%comment}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%article}}`
        $this->dropForeignKey(
            '{{%fk-comment-article_id}}',
            '{{%comment}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-comment-article_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
