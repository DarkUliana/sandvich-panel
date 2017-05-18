<?php

class m170518_070424_add_slug_to_phone extends studio32x32\components\migration\Migration
{
    private $_table = '{{%phone}}';
    public function up()
    {
        $this->addColumn($this->_table, 'slug', $this->string()->notNull());
    }

    public function down()
    {
        $this->dropColumn($this->_table, 'slug');
    }

}
