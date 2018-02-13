<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180213_194042_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'record_id'=>$this->integer(),
            'comment_date'=>$this->dateTime(),
            'comments_info'=>$this->string(),
            'user_id'=>$this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
