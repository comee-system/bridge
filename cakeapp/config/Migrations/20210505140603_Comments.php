<?php
use Migrations\AbstractMigration;

class Comments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {

        // テーブルの作成
        $table = $this->table('comments');

        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('response', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
            'comment'=>"1:admin 2:user"
        ]);
        $table->addColumn('build_id', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('tenant_id', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('code', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
            'comment'=>"1:build 2:tenant"
        ]);
        $table->addColumn('readflag', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
            'comment'=>"1:kidoku 0:midoku"
        ]);


        $table->addColumn('status', 'integer', [
            'default' => 1,
            'limit' => 3,
            'null' => true,
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
            'update' => 'CURRENT_TIMESTAMP'
        ]);
        $table->create();

    }
}
