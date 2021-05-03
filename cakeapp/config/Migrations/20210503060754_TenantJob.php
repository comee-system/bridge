<?php
use Migrations\AbstractMigration;

class TenantJob extends AbstractMigration
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
        $table = $this->table('tenant_job');
        $table->addColumn('tenant_id', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('jobtype', 'integer', [
            'default' => null,
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
