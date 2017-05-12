<?php

class m170512_074738_checkerboard_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%checkerboard_translation}}');
        $this->_widgetTable = $this->tableName('{{%checkerboard}}');
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
            'checkerboard_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-checkerboard_id-language',
            $this->_tableName,
            ['checkerboard_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-checkerboard_id',
            $this->_tableName,
            'checkerboard_id',
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
