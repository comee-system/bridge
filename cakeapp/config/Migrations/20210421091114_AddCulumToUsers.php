<?php
use Migrations\AbstractMigration;

class AddCulumToUsers extends AbstractMigration
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
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'role'
        ]);
        $table->addColumn('sei', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'email'
        ]);
        $table->addColumn('mei', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'sei'
        ]);
        $table->addColumn('sei_kana', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'mei'
        ]);
        $table->addColumn('mei_kana', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'sei_kana'
        ]);
        $table->addColumn('company', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'mei_kana'
        ]);
        $table->addColumn('job', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => false,
            'after'=>'company'
        ]);
        $table->addColumn('post', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'job'
        ]);
        $table->addColumn('prefecture', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => false,
            'after'=>'post'
        ]);
        $table->addColumn('city', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'prefecture'
        ]);
        $table->addColumn('space', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'city'
        ]);
        $table->addColumn('build', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'space'
        ]);
        $table->addColumn('busyo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'build'
        ]);
        $table->addColumn('tel', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after'=>'build'
        ]);

        $table->update();
    }
}
