<?php

class m170512_081128_panel_project_table extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%panel_project_translation}}');
        $this->_widgetTable = $this->tableName('{{%panel_project}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string()->notNull(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
            'position' => $this->integer()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'panel_project_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-panel_project_id-language',
            $this->_tableName,
            ['panel_project_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-panel_project_id',
            $this->_tableName,
            'panel_project_id',
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
