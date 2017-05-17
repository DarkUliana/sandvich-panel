<?php

class m170517_162334_image_url extends studio32x32\components\migration\Migration
{
    private $_tables = ['{{%refrigeration_equipment}}', '{{%panel_project}}', '{{%checkerboard}}'];
    
    public function up()
    {
        foreach ($this->_tables as $value) {
            $this->addColumn($value, 'image_url', $this->string()->notNull());
        }
    }

    public function down()
    {
        foreach ($this->_tables as $value) {
            $this->dropColumn($value, 'image_url', $this->string()->notNull());
        }
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
