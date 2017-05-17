<?php

class m170511_145455_add_widget_text_translation extends studio32x32\components\migration\Migration
{
    private $_transTable;
    private $_widgetTable;
    
    public function init()
    {
        parent::init();

        $this->_transTable = $this->tableName('{{%widget_text_translation}}');
        $this->_widgetTable = $this->tableName('{{%widget_text}}');
    }
    
    public function up()
    {
        $this->dropColumn($this->_widgetTable, 'title');
        $this->dropColumn($this->_widgetTable, 'body');

        $this->addColumn($this->_widgetTable, 'name', $this->string()->notNull());

        $this->createTable($this->_transTable, [
            'widget_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_transTable . '-widget_id-language',
            $this->_transTable,
            ['widget_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_transTable . '-widget_id',
            $this->_transTable,
            'widget_id',
            $this->_widgetTable,
            'id',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropTable($this->_transTable);

        $this->dropColumn($this->_widgetTable, 'name');

        $this->addColumn($this->_widgetTable, 'title', $this->string(512)->notNull());
        $this->addColumn($this->_widgetTable, 'body', $this->text()->notNull());
    }


}
