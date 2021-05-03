<?php
use Migrations\AbstractMigration;

class Tenants extends AbstractMigration
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
        $table = $this->table('tenants');
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
        $table->addColumn('floor', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('min_floor', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('max_floor', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('rent_money_min', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('rent_money_max', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('space_money_min', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('space_money_max', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('job', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('sub', 'integer', [
            'default' => 0,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('start', 'date', [
            'default' => 0,
            'null' => true,
        ]);
        $table->addColumn('end', 'date', [
            'default' => 0,
            'null' => true,
        ]);
        $table->addColumn('open', 'integer', [
            'default' => 0,
            'limit' => 3,
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
