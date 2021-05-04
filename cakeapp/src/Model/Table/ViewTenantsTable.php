<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ViewTenants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ViewTenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ViewTenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ViewTenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ViewTenant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViewTenant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViewTenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ViewTenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ViewTenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ViewTenantsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('view_tenants');
        $this->setDisplayField('name');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmptyString('id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->integer('floor')
            ->allowEmptyString('floor');

        $validator
            ->integer('min_floor')
            ->allowEmptyString('min_floor');

        $validator
            ->integer('max_floor')
            ->allowEmptyString('max_floor');

        $validator
            ->integer('rent_money_min')
            ->allowEmptyString('rent_money_min');

        $validator
            ->integer('rent_money_max')
            ->allowEmptyString('rent_money_max');

        $validator
            ->integer('space_money_min')
            ->allowEmptyString('space_money_min');

        $validator
            ->integer('space_money_max')
            ->allowEmptyString('space_money_max');

        $validator
            ->integer('job')
            ->allowEmptyString('job');

        $validator
            ->integer('sub')
            ->allowEmptyString('sub');

        $validator
            ->date('start')
            ->allowEmptyDate('start');

        $validator
            ->date('end')
            ->allowEmptyDate('end');

        $validator
            ->integer('open')
            ->allowEmptyString('open');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('prefs')
            ->allowEmptyString('prefs');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
