<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

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

    public function validationEdit(Validator $validator)
    {
       return $this->validationDefault($validator,"edit");
    }
    public function validationImport(Validator $validator)
    {
        $validator
            ->maxLength('email', 255)
            ->notEmptyString('email', '「メールアドレス」を入力してください。')
            ->email('email', 'false', '「メールアドレス」の形式で入力してください。')
            ->add('email', 'custom', [
                'rule' => [$this, 'sameEmailCheck'],
                'message' => '既に登録されているメールアドレス若しくは重複データです。',
            ]);

        return $validator;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator,$type="")
    {

        $validator
            ->scalar('sei')
            ->maxLength('sei', 128)
            ->notEmptyString('sei', '「姓」を入力してください。');

        $validator
            ->scalar('mei')
            ->maxLength('mei', 255)
            ->notEmptyString('mei', '「名」を入力してください。');

        $validator
            ->scalar('sei_kana')
            ->maxLength('sei_kana', 255)
            ->notEmptyString('sei_kana', '「せい」を入力してください。');

        $validator
            ->scalar('mei_kana')
            ->maxLength('mei_kana', 255)
            ->notEmptyString('mei_kana', '「めい」を入力してください。');

        $validator
            ->scalar('company')
            ->maxLength('company', 255)
            ->notEmptyString('company', '「企業名」を入力してください。');

        $validator
            ->notEmptyString('job', '「業種」を選択してください。');

        $validator
            ->scalar('post1')
            ->maxLength('post1', 7)
            ->notEmptyString('post1', '「郵便番号3桁」を入力してください。')
            ->integer('post1', '郵便番号は数字で入力してください');

        $validator
            ->scalar('post2')
            ->maxLength('post2', 7)
            ->notEmptyString('post2', '「郵便番号4桁」を入力してください。')
            ->integer('post2', '郵便番号は数字で入力してください。');

        $validator
            ->notEmptyString('prefecture', '「都道府県」を選択してください。');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->notEmptyString('city', '「市区町村」を入力してください。');

        $validator
            ->scalar('space')
            ->maxLength('space', 255)
            ->notEmptyString('space', '「番地」を入力してください。');

        $validator
            ->maxLength('build', 255)
            ->allowEmptyString('build');

        $validator
            ->scalar('busyo')
            ->maxLength('busyo', 255)
            ->notEmptyString('busyo', '「部署名」を入力してください。');

        $validator
            ->scalar('tel1')
            ->maxLength('tel1', 4)
            ->notEmptyString('tel1', '「電話番号1」を入力してください。')
            ->integer('tel1', '電話番号は数字で入力してください。');

        $validator
            ->scalar('tel2')
            ->maxLength('tel2', 4)
            ->notEmptyString('tel2', '「電話番号2」を入力してください。')
            ->integer('tel2', '電話番号は数字で入力してください。');

        $validator
            ->scalar('tel3')
            ->maxLength('tel3', 4)
            ->notEmptyString('tel3', '「電話番号3」を入力してください。')
            ->integer('tel3', '電話番号は数字で入力してください。');

        $validator
            ->maxLength('email', 255)
            ->notEmptyString('email', '「メールアドレス」を入力してください。')
            ->email('email', 'false', '「メールアドレス」の形式で入力してください。')
            ->add('email', 'custom', [
                'rule' => [$this, 'sameEmailCheck'],
                'message' => '既に登録されているメールアドレスです。',
            ]);

        //エディットの時は空欄を許可する
        if($type == "edit"){
            $validator
                ->allowEmpty('password', function ($context) {
                    return empty($context['data']['password']);
            })
            ->minLength('password', 8, '8文字以上で登録してください。')
            ->alphaNumeric('password', '「半角英数」で入力してください。');
        }else{
            $validator
                ->scalar('password')
                ->maxLength('password', 255)
                ->minLength('password', 8, '8文字以上で登録してください。')
                ->notEmptyString('password', '「パスワード」を入力してください')
                ->alphaNumeric('password', '「半角英数」で入力してください。');
        }
        if($type != "admin"){
            $validator
                ->scalar('agree')
                ->notEmptyString('agree', 'create','「同意する」を選択してください。');
        }

        return $validator;
    }



    /**
     * メールアドレス重複チェック
     *
     */
    public function sameEmailCheck($value, $context)
    {
        if(isset($context[ 'data' ][ 'id' ]) && $context[ 'data' ][ 'id' ]){
            $where = [ 'email'=>$value , 'id != '=>$context[ 'data' ][ 'id' ] ];
        }else{
            $where = [ 'email'=>$value ];
        }
        $data = $this->find('all')->where($where)->first();
        if ($data) {
            return false;
        } else {
            return true;
        }
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
        return $rules;
    }
}
