<?php
use Migrations\AbstractMigration;

class AddCulumsToQuestions extends AbstractMigration
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
        $table = $this->table('questions');
        $table->addColumn('busyo', 'string', [
            'default' => null,
            'limit'=>512,
            'null' => true,
            'after'=> 'campany'
        ]);
        $table->addColumn('sei_kana', 'string', [
            'default' => null,
            'limit'=>128,
            'null' => true,
            'after'=> 'mei'
        ]);
        $table->addColumn('mei_kana', 'string', [
            'default' => null,
            'limit'=>128,
            'null' => true,
            'after'=> 'sei_kana'
        ]);
        $table->addColumn('zip', 'string', [
            'default' => null,
            'limit'=>128,
            'null' => true,
            'after'=> 'tel'
        ]);
        $table->addColumn('pref', 'integer', [
            'default' => null,
            'limit'=>3,
            'null' => true,
            'after'=> 'zip'
        ]);
        $table->addColumn('address', 'string', [
            'default' => null,
            'limit'=>512,
            'null' => true,
            'after'=> 'pref'
        ]);
        $table->update();
    }
}
