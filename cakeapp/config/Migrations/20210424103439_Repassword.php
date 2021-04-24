<?php
use Migrations\AbstractMigration;

class Repassword extends AbstractMigration
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
        $table = $this->table('repasswords');
        $table->addColumn('users_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('limitdate', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
