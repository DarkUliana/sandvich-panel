<?php


class m170511_141824_add_page_translation extends studio32x32\components\migration\Migration
{
    private $_tableName;
    private $_pageTable;
    
    public function init()
    {
        parent::init();

        $this->_tableName = $this->tableName('{{%page_translation}}');
        $this->_pageTable = $this->tableName('{{%page}}');
    }

    public function up()
    {
        $this->dropColumn($this->_pageTable, 'title');
        $this->dropColumn($this->_pageTable, 'body');

        $this->addColumn($this->_pageTable, 'name', $this->string()->notNull());

        $this->createTable($this->_tableName, [
            'page_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text(),
            'tkd_title' => $this->string(),
            'tkd_keyword' => $this->string(),
            'tkd_description' => $this->text(),
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
            $this->_pageTable,
            'id',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropTable($this->_tableName);

        $this->dropColumn($this->_pageTable, 'name');

        $this->addColumn($this->_pageTable, 'title', $this->string(512)->notNull());
        $this->addColumn($this->_pageTable, 'body', $this->text()->notNull());
    }
}
