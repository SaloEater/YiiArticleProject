<?php

use yii\db\Migration;

/**
 * Handles adding updated_by to table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190710_094621_add_updated_by_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'updated_by', $this->integer());

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
            '{{%fk-article-updated_by}}',
            '{{%article}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-article-updated_by}}',
            '{{%article}}'
        );

        $this->dropColumn('{{%article}}', 'updated_by');
    }
}
