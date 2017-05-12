<?php

class m170512_072757_text_under_slider extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%text_under_slider_translation}}');
        $this->_widgetTable = $this->tableName('{{%text_under_slider}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'text_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'small_text' => $this->string(512)->notNull(),
            'big_text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-text_id-language',
            $this->_tableName,
            ['text_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-text_id',
            $this->_tableName,
            'text_id',
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
