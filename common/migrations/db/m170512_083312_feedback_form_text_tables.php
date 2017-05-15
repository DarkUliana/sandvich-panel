<?php

class m170512_083312_feedback_form_text_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%feedback_form_text_translation}}');
        $this->_widgetTable = $this->tableName('{{%feedback_form_text}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),

        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'feedback_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'under_title' => $this->string(512)->notNull(),
            'insert_name' => $this->string(512)->notNull(),
            'insert_email' => $this->string(512)->notNull(),
            'insert_phone' => $this->string(512)->notNull(),
            'button_text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-feedback_id-language',
            $this->_tableName,
            ['feedback_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-feedback_id',
            $this->_tableName,
            'feedback_id',
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
