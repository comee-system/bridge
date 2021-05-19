<?php
use Migrations\AbstractMigration;

class AddNumberToTenantHope extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tenant_hope');
        $table->addColumn('Number', 'integer', [
            'default' => 1,
            'limit' => 3,
            'null' => true,
            'after'=> 'pref'
        ]);
        $table->update();
    }
}
