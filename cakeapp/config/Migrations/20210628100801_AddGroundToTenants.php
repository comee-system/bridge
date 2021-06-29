<?php
use Migrations\AbstractMigration;

class AddGroundToTenants extends AbstractMigration
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
        $table->addColumn('min_ground', 'float', [
            'default' => null,
            'limit'=>11,
            'null' => true,
            'after'=> 'max_floor'
        ]);
        $table->addColumn('max_ground', 'float', [
            'default' => null,
            'limit'=>11,
            'null' => true,
            'after'=> 'min_ground'
        ]);

        $table->update();
    }
}
