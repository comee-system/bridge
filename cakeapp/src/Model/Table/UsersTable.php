<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('sei')
            ->maxLength('sei', 255)
            ->notEmptyString('sei', '姓を入力してください');

        $validator
            ->scalar('mei')
            ->maxLength('mei', 255)
            ->notEmptyString('mei', '名を入力してください');

        $validator
            ->scalar('sei_kana')
            ->maxLength('sei_kana', 255)
            ->notEmptyString('sei_kana', 'せいを入力してください');

        $validator
            ->scalar('mei_kana')
            ->maxLength('mei_kana', 255)
            ->notEmptyString('mei_kana', 'めいを入力してください');

        $validator
            ->scalar('company')
            ->maxLength('company', 255)
            ->notEmptyString('company', '企業名を入力してください');

        $validator
            ->scalar('post1')
            ->maxLength('post1', 7)
            ->notEmptyString('post1', '郵便番号を入力してください')
            ->integer('post1', '数字で入力してください');

        $validator
            ->scalar('post2')
            ->maxLength('post2', 7)
            ->notEmptyString('post2', '郵便番号を入力してください')
            ->integer('post2', '数字で入力してください');

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 255)
            ->notEmptyString('prefecture', '都道府県を選択してください');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->notEmptyString('city', '市区町村を入力してください');
        $validator
            ->scalar('space')
            ->maxLength('space', 255)
            ->notEmptyString('space', '番地を入力してください');
        $validator
            ->scalar('build')
            ->maxLength('build', 255)
            ->allowEmptyString('build');

        $validator
            ->scalar('busyo')
            ->maxLength('busyo', 255)
            ->notEmptyString('busyo', '部署名を入力してください');

        $validator
            ->scalar('tel1')
            ->maxLength('tel1', 255)
            ->notEmptyString('tel1', '電話番号を入力してください')
            ->integer('tel1', '数字で入力してください');

        $validator
            ->scalar('tel2')
            ->maxLength('tel2', 255)
            ->notEmptyString('tel2', '電話番号を入力してください')
            ->integer('tel2', '数字で入力してください');

        $validator
            ->scalar('tel3')
            ->maxLength('tel3', 255)
            ->notEmptyString('tel3', '電話番号を入力してください')
            ->integer('tel3', '数字で入力してください');

        $validator
            ->scalar('email')
            ->maxLength('email', 255)
            ->notEmptyString('email', '電話番号を入力してください')
            ->email('email', 'メールアドレスの形式で入力してください');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->minLength('password', 8)
            ->notEmptyString('password', 'パスワードを入力してください');


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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
