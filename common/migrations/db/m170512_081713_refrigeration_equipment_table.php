<?php

class m170512_081713_refrigeration_equipment_table extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%refrigeration_equipment_translation}}');
        $this->_widgetTable = $this->tableName('{{%refrigeration_equipment}}');
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
            'equipment_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-equipment_id-language',
            $this->_tableName,
            ['equipment_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-equipment_id',
            $this->_tableName,
            'equipment_id',
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
