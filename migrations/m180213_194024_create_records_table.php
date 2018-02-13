<?php

use yii\db\Migration;

/**
 * Handles the creation of table `records`.
 */
class m180213_194024_create_records_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(), //будем цеплять к user=id
            'link'=>$this->string(),
            'record_date'=>$this->dateTime(),
            'record_info'=>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('records');
    }
}
