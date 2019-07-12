<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%article}}`
 * - `{{%comment}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m190712_073408_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'article_id' => $this->integer(),
            'parent_id' => $this->integer()->defaultValue(null),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

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

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}',
            'parent_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}',
            'parent_id',
            '{{%comment}}',
            'id',
            'CASCADE'
        );

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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
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

        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}'
        );

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

        $this->dropTable('{{%comment}}');
    }
}
