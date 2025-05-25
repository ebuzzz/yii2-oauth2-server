<?php

use yii\db\Schema;

class m250523_005800_add_primary_key_to_oauth_public_keys_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->addPrimaryKey('oauth_public_keys_pk', '{{%oauth_public_keys}}', 'client_id');
    }

    public function safeDown()
    {
        $this->dropPrimaryKey('oauth_public_keys_pk', '{{%oauth_public_keys}}');
    }
}
