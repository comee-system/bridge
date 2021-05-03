<?php
use Migrations\AbstractMigration;

class AdduploadfilenameToBuilds extends AbstractMigration
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
        $table = $this->table('builds');
        $table->addColumn('uploadfilename', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => true,
            'after'=> 'uploadfile'
        ]);
        $table->update();
    }
}
