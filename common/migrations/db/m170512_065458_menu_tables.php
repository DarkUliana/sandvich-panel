<?php

class m170512_065458_menu_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%menu_translation}}');
        $this->_widgetTable = $this->tableName('{{%menu}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
            'position' => $this->integer()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'menu_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-menu_id-language',
            $this->_tableName,
            ['menu_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-menu_id',
            $this->_tableName,
            'menu_id',
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
