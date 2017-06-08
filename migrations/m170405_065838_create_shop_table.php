<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m170405_065838_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'body' => $this->string(),
            'dops' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop');
    }
}
