<?php
use Migrations\AbstractMigration;

class AddOtherToTenants extends AbstractMigration
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
        $table = $this->table('tenants');
        $table->addColumn('other', 'text', [
            'default' => null,
            'null' => true,
            'after'=> 'open'
        ]);
        $table->update();
    }
}
