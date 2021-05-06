<?php
use Migrations\AbstractMigration;

class AddFileTocomments extends AbstractMigration
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
        $table = $this->table('comments');
        $table->addColumn('file', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
            'after'=> 'readflag'
        ]);
        $table->addColumn('filename', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => true,
            'after'=> 'file'
        ]);
        $table->update();
    }
}
