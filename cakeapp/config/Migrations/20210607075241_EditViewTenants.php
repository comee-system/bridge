<?php
use Migrations\AbstractMigration;

class EditViewTenants extends AbstractMigration
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

        $sql = "
        create view view_tenants as
        select
            `t`.`id` AS `id`,
            `t`.`user_id` AS `user_id`,
            `t`.`name` AS `name`,
            `t`.`floor` AS `floor`,
            `t`.`min_floor` AS `min_floor`,
            `t`.`max_floor` AS `max_floor`,
            `t`.`rent_money_min` AS `rent_money_min`,
            `t`.`rent_money_max` AS `rent_money_max`,
            `t`.`space_money_min` AS `space_money_min`,
            `t`.`space_money_max` AS `space_money_max`,
            `t`.`job` AS `job`,
            `t`.`sub` AS `sub`,
            `t`.`start` AS `start`,
            `t`.`end` AS `end`,
            `t`.`open` AS `open`,
            `t`.`status` AS `status`,
            `t`.`created` AS `created`,
            `t`.`modified` AS `modified`,
            group_concat(distinct `th`.`pref`
                order by `th`.`Number` ASC
                separator ',') AS `prefs`,
            group_concat(distinct `tj`.`jobtype`
                separator ',') AS `jobtypes`,
            count(distinct `c`.`build_id`) AS `roomcount`
        from
            ((`tenants` `t`
            left join `tenant_hope` `th` ON ((`t`.`id` = `th`.`tenant_id`)))
            left join `tenant_job` `tj` ON ((`t`.`id` = `tj`.`tenant_id`)))
            left join `comments` `c` ON ((`c`.`tenant_id` = `t`.`id` ))
        where
            (`t`.`status` <> 0)
        group by `t`.`id`
        ";

        $count = $this->execute($sql);
    }
}
