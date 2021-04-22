<?php
use Migrations\AbstractMigration;

class AddStatusToUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('status', 'integer', [
            'default' => 1,
            'comment'=>'1:有効 0:無効',
            'limit' => 1,
            'null' => true,
            'after'=>'busyo'
        ]);
        $table->update();
    }
}
