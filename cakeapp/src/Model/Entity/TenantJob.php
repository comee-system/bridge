<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TenantJob Entity
 *
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $jobtype
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Tenant $tenant
 */
class TenantJob extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tenant_id' => true,
        'jobtype' => true,
        'created' => true,
        'modified' => true,
        'tenant' => true,
    ];
}
