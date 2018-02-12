<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180212_202317_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username'=>$this->string(),
            'password'=>$this->string(),
            'auth_key'=>$this->string(),
            'acess_token'=>$this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
