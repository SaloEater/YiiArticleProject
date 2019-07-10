<?php

use yii\db\Migration;

/**
 * Handles adding created_by to table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190710_094537_add_created_by_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'created_by', $this->integer());

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

        $this->dropColumn('{{%article}}', 'created_by');
    }
}
