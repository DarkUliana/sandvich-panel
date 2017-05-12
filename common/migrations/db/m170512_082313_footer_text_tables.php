<?php

class m170512_082313_footer_text_tables extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%footer_text_translation}}');
        $this->_widgetTable = $this->tableName('{{%footer_text}}');
    }
    
    public function up()
    {
        $this->createTable($this->_widgetTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),

        ], $this->tableOptions);


        $this->createTable($this->_tableName, [
            'footer_text_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'contacts' => $this->string(512)->notNull(),
            'question_title' => $this->string(512)->notNull(),
            'question_text' => $this->string(512)->notNull(),
            'button_text' => $this->string(512)->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-footer_text_id-language',
            $this->_tableName,
            ['footer_text_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-footer_text_id',
            $this->_tableName,
            'footer_text_id',
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
