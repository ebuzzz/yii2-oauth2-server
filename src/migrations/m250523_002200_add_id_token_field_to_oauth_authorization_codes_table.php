<?php

use yii\db\Schema;

class m250523_002200_add_id_token_field_to_oauth_authorization_codes_table extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%oauth_authorization_codes}}', 'id_token', 'VARCHAR(2000) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('{{%oauth_authorization_codes}}', 'id_token');
    }
}
