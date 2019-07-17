<?php

use yii\db\Migration;

/**
 * Handles adding name to table `{{%tag}}`.
 */
class m190717_144724_add_name_column_to_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tag}}', 'name', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tag}}', 'name');
    }
}
