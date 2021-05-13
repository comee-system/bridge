<?php
use Migrations\AbstractMigration;

class AddCommentStatus2ToComments extends AbstractMigration
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
        $table->addColumn('comment_status', 'integer', [
            'default' => 1,
            'limit' => 3,
            'null' => true,
            "after"=>"filename",
            "comment"=>"1:紹介済み 2:交渉開始"
        ]);
        $table->update();
    }
}
