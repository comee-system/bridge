<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @method \App\Model\Entity\Question get($primaryKey, $options = [])
 * @method \App\Model\Entity\Question newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Question|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Question[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Question findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionsTable extends Table
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

        $this->setTable('questions');
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
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('sei')
            ->maxLength('sei', 255)
            ->requirePresence('sei', 'create')
            ->notEmptyString('sei',__("姓を入力してください。"));

        $validator
            ->scalar('mei')
            ->maxLength('mei', 255)
            ->requirePresence('mei', 'create')
            ->notEmptyString('mei',__("名を入力してください。"));
        $validator
            ->scalar('sei_kana')
            ->maxLength('sei', 255)
            ->requirePresence('sei', 'create')
            ->notEmptyString('sei',__("姓(かな)を入力してください。"));

        $validator
            ->scalar('mei_kana')
            ->maxLength('mei', 255)
            ->requirePresence('mei', 'create')
            ->notEmptyString('mei',__("名(かな)を入力してください。"));
/*
        $validator
            ->scalar('campany')
            ->maxLength('campany', 255)
            ->requirePresence('campany', 'create')
            ->notEmptyString('campany',__("企業名を入力してください。"));
*/
        $validator
            ->scalar('mail')
            ->maxLength('mail', 255)
            ->requirePresence('mail', 'create')
            ->notEmptyString('mail',__("メールアドレスを入力してください。"));

        $validator
            ->scalar('tel')
            ->maxLength('tel', 255)
            ->requirePresence('tel', 'create')
            ->notEmptyString('tel',__("電話番号を入力してください。"));

        $validator
            ->scalar('note')
            ->requirePresence('note', 'create')
            ->notEmptyString('note',__("問合せ内容を入力してください。"));

        return $validator;
    }
}
