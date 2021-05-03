<?php
use Migrations\AbstractMigration;

class Builds extends AbstractMigration
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
        $table = $this->table('builds');
        $table->addColumn('user_id', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);

        $table->addColumn('post1', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('post2', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('city', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
        ]);
        $table->addColumn('space', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
        ]);
        $table->addColumn('build', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
        ]);
        $table->addColumn('shop_type', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('shop_area', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('agreement', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('security_money', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('rent_money', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('common_money', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('parking_count', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('build_type', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('constract_type', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('uploadfile', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
        ]);
        $table->addColumn('other', 'text', [
            'null' => true,
        ]);
        $table->addColumn('start', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('end', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('open', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('message', 'text', [
            'null' => true,
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
