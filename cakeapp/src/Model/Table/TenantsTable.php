<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tenants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TenantHopeTable&\Cake\ORM\Association\HasMany $TenantHope
 * @property \App\Model\Table\TenantJobTable&\Cake\ORM\Association\HasMany $TenantJob
 *
 * @method \App\Model\Entity\Tenant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tenant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tenant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tenant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tenant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tenant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tenant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tenant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TenantsTable extends Table
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

        $this->setTable('tenants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('TenantHope', [
            'foreignKey' => 'tenant_id',
        ]);
        $this->hasMany('TenantJob', [
            'foreignKey' => 'tenant_id',
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'tenant_id',
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
        /*
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');
*/
        $validator
            ->scalar('name')
            ->maxLength('name', 128,__("入力文字が多すぎます。"))
            ->notEmptyString('name', __('テナント名称を入力してください。'));

        $validator
         //   ->integer('floor')
         //   ->notEmptyString('floor',__("坪数を選択してください。"))
            ->notEmptyString("max_floor","建物最大坪数を入力してください。")
            ->notEmptyString("min_floor","建物最小坪数を入力してください。")
            ->add("max_floor","min_floor",[
                "rule"=>function($value,$context){
                    $min_floor = $context["data"]["min_floor"];
                    $max_floor = $context["data"]["max_floor"];
                    if($max_floor < $min_floor){
                        return false;
                    }
                    return true;
                },
                "message"=>"坪数の選択に謝りがあります。"
            ]);
        $validator
            ->allowEmptyString("max_ground")
            ->allowEmptyString("min_ground")
            ->add("max_ground","min_ground",[
                "rule"=>function($value,$context){
                    $min_ground = $context["data"]["min_ground"];
                    $max_ground = $context["data"]["max_ground"];
                    if($max_ground < $min_ground){
                        return false;
                    }
                    return true;
                },
                "message"=>"坪数の選択に謝りがあります。"
            ]);
/*
        $validator
            ->integer('min_floor')
            ->allowEmptyString('min_floor',__("最小坪数を選択してください。"));

        $validator
            ->integer('max_floor')
            ->allowEmptyString('max_floor',__("最大坪数を選択してください。"));
*/
        $validator
            ->integer('rent_money_min')
            ->notEmptyString('rent_money_min',__("最小賃料を選択してください。"));

        $validator
            ->integer('rent_money_max')
            ->notEmptyString('rent_money_max',__("最大賃料を選択してください。"));

        /*
        $validator
            ->integer('space_money_min')
            ->allowEmptyString('space_money_min',__("最小坪単価を選択してください。"));

        $validator
            ->integer('space_money_max')
            ->allowEmptyString('space_money_max',__("最大坪単価を選択してください。"));
*/

        $validator
            ->integer('job')
            ->notEmptyString('job',__("業種を選択してください。"));
/*
        $validator
            ->integer('sub')
            ->notEmptyString('sub',__("サブカテゴリを選択してください。"));

        $validator
            ->date('start')
            ->allowEmptyString('start')
            ->add("start","end",[
                "rule"=>function($value,$context){
                    $start = $context["data"]["start"];
                    $end = $context["data"]["end"];
                    if($end < $start){
                        return false;
                    }
                    return true;
                },
                "message"=>"日付に謝りがあります。"
            ]);

        $validator
            ->date('end')
            ->allowEmptyString('end');

        $validator
            ->integer('open')
            ->allowEmptyString('open');
*/

        $validator
            ->requirePresence('agree',"create","同意するにチェックしてください");
/*
        $validator
            ->integer('status')
            ->allowEmptyString('status');
*/
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
