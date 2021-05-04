<?php
use Migrations\AbstractMigration;

class UpViewTenants extends AbstractMigration
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

        $count = $this->execute(
            '
            create view view_tenants as
            SELECT
                t.*,
                GROUP_CONCAT(th.pref) as prefs
            FROM bridge.tenants as t
            LEFT JOIN tenant_hope as th ON t.id = th.tenant_id
            WHERE t.status = 1
            GROUP BY t.id
            '
        );

    }
}
