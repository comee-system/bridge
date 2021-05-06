<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommentDetail Entity
 *
 * @property int $id
 * @property int|null $comment_id
 * @property int|null $user_id
 * @property int|null $response
 * @property int|null $tenant_id
 * @property int|null $code
 * @property int|null $read
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Comment $comment
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tenant $tenant
 */
class CommentDetail extends Entity
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
        'comment_id' => true,
        'user_id' => true,
        'response' => true,
        'tenant_id' => true,
        'comment' => true,
        'code' => true,
        'read' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'tenant' => true,
    ];
}
