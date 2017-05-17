<?php

class m170512_124827_feedback_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;

    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%feedback}}');
    }

    public function up()
    {
        $this->createTable($this->_tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'datetime' => $this->dateTime(),
            'check' => $this->tinyint()->notNull()->defaultValue(1),
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable($this->_tableName);
    }
}
