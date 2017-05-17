<?php

class m170511_151415_phone_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;

    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%phone}}');
    }

    public function up()
    {
        $this->createTable($this->_tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
            'position' => $this->integer()->notNull()->defaultValue(1),
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable($this->_tableName);
    }
}
