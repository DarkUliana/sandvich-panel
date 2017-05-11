<?php

class m170511_145455_add_widget_text_translation extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%widget_text_translation}}');
        $this->_widgetTable = $this->tableName('{{%widget_text}}');
    }
    
    public function up()
    {
        $this->dropColumn($this->_widgetTable, 'title');
        $this->dropColumn($this->_widgetTable, 'body');

        $this->addColumn($this->_widgetTable, 'name', $this->string()->notNull());

        $this->createTable($this->_tableName, [
            'page_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_tableName . '-page_id-language',
            $this->_tableName,
            ['page_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_tableName . '-page_id',
            $this->_tableName,
            'page_id',
            $this->_widgetTable,
            'id',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropTable($this->_tableName);

        $this->dropColumn($this->_widgetTable, 'name');

        $this->addColumn($this->_widgetTable, 'title', $this->string(512)->notNull());
        $this->addColumn($this->_widgetTable, 'body', $this->text()->notNull());
    }


}
