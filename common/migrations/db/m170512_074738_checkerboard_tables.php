<?php

class m170512_074738_checkerboard_tables extends studio32x32\components\migration\Migration
{
    private $_transTable;
    private $_tableName;
    
    public function init()
    {
        parent::init();

        $this->_transTable = $this->tableName('{{%checkerboard_translation}}');
        $this->_tableName = $this->tableName('{{%checkerboard}}');
    }
    
    public function up()
    {
        $this->createTable($this->_tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string()->notNull(),
            'active' => $this->tinyint()->notNull()->defaultValue(1),
            'position' => $this->integer()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createTable($this->_transTable, [
            'checkerboard_id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text()->notNull(),
        ]);

        $this->addPrimaryKey(
            'pk-' . $this->_transTable . '-checkerboard_id-language',
            $this->_transTable,
            ['checkerboard_id', 'language']
        );

        $this->addForeignKey(
            'fk-' . $this->_transTable . '-checkerboard_id',
            $this->_transTable,
            'checkerboard_id',
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
