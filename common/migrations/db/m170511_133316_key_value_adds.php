<?php

use yii\db\Migration;

class m170511_133316_key_value_adds extends Migration
{
    private $_tableName = '{{%key_storage_item}}';
    
    public function up()
    {
        $this->db->createCommand()->batchInsert($this->_tableName, [
            'key', 'value', 'comment', 'updated_at', 'created_at'
        ], [
            ['backend.contentActivePages', 'page,phone,menu,widget-text,index-item,feedback,project,equipment,article,article-category,frontend-menu,slider,social,widget-text', 'Leftside menu content menu subpages', time(), time()],
            ['backend.otherActivePages', 'i18n,key-storage,file-storage,cache,file-manager,system-information,log', 'Leftside menu other menu subpages', time(), time()],
        ])->execute();
    }

    public function down()
    {
        $this->db->createCommand()->delete($this->_tableName, [
            'key' => ['backend.contentActivePages', 'backend.otherActivePages']
        ])->execute();
    }
}
