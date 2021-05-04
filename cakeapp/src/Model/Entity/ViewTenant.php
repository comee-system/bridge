<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ViewTenant Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property int|null $floor
 * @property int|null $min_floor
 * @property int|null $max_floor
 * @property int|null $rent_money_min
 * @property int|null $rent_money_max
 * @property int|null $space_money_min
 * @property int|null $space_money_max
 * @property int|null $job
 * @property int|null $sub
 * @property \Cake\I18n\FrozenDate|null $start
 * @property \Cake\I18n\FrozenDate|null $end
 * @property int|null $open
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $prefs
 *
 * @property \App\Model\Entity\User $user
 */
class ViewTenant extends Entity
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
        'id' => true,
        'user_id' => true,
        'name' => true,
        'floor' => true,
        'min_floor' => true,
        'max_floor' => true,
        'rent_money_min' => true,
        'rent_money_max' => true,
        'space_money_min' => true,
        'space_money_max' => true,
        'job' => true,
        'sub' => true,
        'start' => true,
        'end' => true,
        'open' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'prefs' => true,
        'user' => true,
    ];
}
