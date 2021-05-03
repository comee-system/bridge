<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Build Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property int|null $post1
 * @property int|null $post2
 * @property string|null $city
 * @property string|null $space
 * @property string|null $build
 * @property int|null $shop_type
 * @property int|null $shop_area
 * @property int|null $agreement
 * @property int|null $security_money
 * @property int|null $rent_money
 * @property int|null $common_money
 * @property int|null $parking_count
 * @property int|null $build_type
 * @property int|null $constract_type
 * @property string|null $uploadfile
 * @property string|null $other
 * @property \Cake\I18n\FrozenDate|null $start
 * @property \Cake\I18n\FrozenDate|null $end
 * @property int|null $open
 * @property string|null $message
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Build extends Entity
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
        'user_id' => true,
        'name' => true,
        'post1' => true,
        'post2' => true,
        'pref' => true,
        'city' => true,
        'space' => true,
        'build' => true,
        'shop_type' => true,
        'shop_area' => true,
        'agreement' => true,
        'security_money' => true,
        'rent_money' => true,
        'common_money' => true,
        'parking_count' => true,
        'build_type' => true,
        'constract_type' => true,
        'uploadfile' => true,
        'uploadfilename' => true,
        'other' => true,
        'start' => true,
        'end' => true,
        'open' => true,
        'message' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
