<?php
use Migrations\AbstractMigration;

class AddViewTenants extends AbstractMigration
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
        $count = $this->execute('drop view view_tenants;');

        $count = $this->execute(
            '
            create view view_tenants as
            SELECT
                t.*,
                GROUP_CONCAT(DISTINCT th.pref) as prefs,
                GROUP_CONCAT(DISTINCT tj.jobtype) as jobtypes
            FROM bridge.tenants as t
            LEFT JOIN tenant_hope as th ON t.id = th.tenant_id
            LEFT JOIN tenant_job as tj ON t.id = tj.tenant_id
            WHERE t.status = 1
            GROUP BY t.id
            '
        );
    }
    public function down()
    {

    }
}
