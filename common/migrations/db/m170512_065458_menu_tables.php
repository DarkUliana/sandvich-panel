<?php

class m170512_065458_menu_tables extends studio32x32\components\migration\Migration
{
    private $_transTable;
    private $_tableName;
    
    public function init()
    {
        parent::init();

        $this->_transTable = $this->tableName('{{%menu_translation}}');
        $this->_tableName = $this->tableName('{{%menu}}');
    }
    
    public function up()
    {
        $this->createTable($this->_tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
            'position' => $this->integer()->notNull()->defaultValue(1),
            'slug' => $this->string()->notNull(),
        ], $this->tableOptions);


        $this->createTable($this->_transTable, [
            'menu_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_transTable . '-menu_id-language',
            $this->_transTable,
            ['menu_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_transTable . '-menu_id',
            $this->_transTable,
            'menu_id',
            $this->_tableName,
            'id',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropTable($this->_transTable);
        $this->dropTable($this->_tableName);

    }

}
