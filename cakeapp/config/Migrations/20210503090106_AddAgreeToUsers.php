<?php
use Migrations\AbstractMigration;

class AddAgreeToUsers extends AbstractMigration
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
        $table->addColumn('agree', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => true,
            'after'=> 'status'
        ]);
        $table->update();
    }
}
