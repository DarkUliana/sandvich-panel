<?php

class m170512_075545_counting_the_cost extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%counting_the_cost_translation}}');
        $this->_widgetTable = $this->tableName('{{%counting_the_cost}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'counting_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'insert_name' => $this->string(512)->notNull(),
            'insert_phone' => $this->string(512)->notNull(),
            'button_text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-counting_id-language',
            $this->_tableName,
            ['counting_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-counting_id',
            $this->_tableName,
            'counting_id',
            $this->_widgetTable,
            'id',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropTable($this->_tableName);
        $this->dropTable($this->_widgetTable);

    }
}
