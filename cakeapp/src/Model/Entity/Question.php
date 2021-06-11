<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $sei
 * @property string $mei
 * @property string $campany
 * @property string $mail
 * @property string $tel
 * @property string $note
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Question extends Entity
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
        'sei' => true,
        'mei' => true,
        'sei_kana' => true,
        'mei_kana' => true,
        'campany' => true,
        'busyo' => true,
        'mail' => true,
        'tel' => true,
        'zip' => true,
        'pref' => true,
        'address' => true,
        'note' => true,
        'created' => true,
        'modified' => true,
    ];
}
