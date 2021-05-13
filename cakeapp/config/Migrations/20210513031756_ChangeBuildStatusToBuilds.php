<?php
use Migrations\AbstractMigration;

class ChangeBuildStatusToBuilds extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('builds');
        $table->changeColumn('build_status', 'integer', [
        'default'=>1
        ]);
        $table->update();
    }
    public function down()
    {
        $table = $this->table('builds');
        $table->changeColumn('build_status', 'integer', [
        'default'=>0
        ]);
        $table->update();
    }
}
