<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * Repasswords Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Repassword get($primaryKey, $options = [])
 * @method \App\Model\Entity\Repassword newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Repassword[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Repassword|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Repassword saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Repassword patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Repassword[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Repassword findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RepasswordsTable extends Table
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

        $this->setTable('repasswords');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->dateTime('limitdate')
            ->requirePresence('limitdate', 'create')
            ->notEmptyDateTime('limitdate');

        $validator
            ->integer('status')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
    public function set($data){
        $code = $this->newEntity();
        $code->users_id= $data->id;
        $code->token= $data->token;
        $code->limitdate= $data->limitdate;
        $code->created= $data->created;
        $code->modified= $data->modified;
        $this->save($code);
    }
    public function validationPasswordEdit(Validator $validator){
        $validator
        ->notEmpty('password',__('パスワードを入力してください。'))
        ->minLength('password', 8, __('8文字以上を入力してください。'))
        ->alphaNumeric('password', 'alphaNumeric', __('半角英数字のみ入力可能です。'))
        ->add('password', [
            'inAlpha' => [
                'rule' => ['custom', '/[a-zA-Z]+/'],
                'message' => __('半角英字を1文字以上利用してください。'),
            ],
            'inNumber' => [
                'rule' => ['custom', '/[0-9]+/'],
                'message' => __('半角数字を1文字以上利用してください。'),
            ],
        ])
        ->requirePresence('password', 'create')
        ->notEmpty('password');


        $validator
        ->notEmpty('password_conf',__('確認用パスワードを入力してください。'))
        ->sameAs('password_conf', 'password', __('異なるパスワードが入力されています。'))
        ->requirePresence('password', 'create')
        ->notEmpty('password');

        return $validator;
    }
}
