<?php

use yii\db\Migration;

/**
 * Class m250627_090539_add_link_gambar_treatmen
 */
class m250627_090539_add_link_gambar_treatmen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('treatment', 'link', $this->string());
        $this->addColumn('treatment', 'gambar', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250627_090539_add_link_gambar_treatmen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250627_090539_add_link_gambar_treatmen cannot be reverted.\n";

        return false;
    }
    */
}
