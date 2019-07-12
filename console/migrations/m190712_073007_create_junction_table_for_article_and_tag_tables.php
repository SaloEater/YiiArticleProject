<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles_tags}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%article}}`
 * - `{{%tag}}`
 */
class m190712_073007_create_junction_table_for_article_and_tag_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles_tags}}', [
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'PRIMARY KEY(article_id, tag_id)',
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-article_tag-article_id}}',
            '{{%articles_tags}}',
            'article_id'
        );

        // add foreign key for table `{{%article}}`
        $this->addForeignKey(
            '{{%fk-article_tag-article_id}}',
            '{{%articles_tags}}',
            'article_id',
            '{{%article}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-article_tag-tag_id}}',
            '{{%articles_tags}}',
            'tag_id'
        );

        // add foreign key for table `{{%tag}}`
        $this->addForeignKey(
            '{{%fk-article_tag-tag_id}}',
            '{{%articles_tags}}',
            'tag_id',
            '{{%tag}}',
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
            '{{%fk-article_tag-article_id}}',
            '{{%articles_tags}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-article_tag-article_id}}',
            '{{%articles_tags}}'
        );

        // drops foreign key for table `{{%tag}}`
        $this->dropForeignKey(
            '{{%fk-article_tag-tag_id}}',
            '{{%articles_tags}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-article_tag-tag_id}}',
            '{{%articles_tags}}'
        );

        $this->dropTable('{{%articles_tags}}');
    }
}
