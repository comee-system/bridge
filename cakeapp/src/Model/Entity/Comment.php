<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $response
 * @property int|null $build_id
 * @property int|null $tenant_id
 * @property string|null $comment
 * @property int|null $code
 * @property int|null $read
 * @property string|null $file
 * @property string|null $filename
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Build $build
 * @property \App\Model\Entity\Tenant $tenant
 */
class Comment extends Entity
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
        'response' => true,
        'build_id' => true,
        'tenant_id' => true,
        'comment' => true,
        'code' => true,
        'readflag' => true,
        'file' => true,
        'filename' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'build' => true,
        'tenant' => true,
    ];
}
