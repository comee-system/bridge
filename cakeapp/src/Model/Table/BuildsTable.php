<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Builds Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Build get($primaryKey, $options = [])
 * @method \App\Model\Entity\Build newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Build[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Build|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Build saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Build patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Build[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Build findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BuildsTable extends Table
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

        $this->setTable('builds');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

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
        /*
        $validator
            ->integer('id')
            ->notEmptyString('id', null, 'create');
        */
        $validator
            ->scalar('name')
            ->maxLength('name', 255,__("物件名称が長すぎます。"))
            ->notEmptyString('name',__("物件名称を入力してください。"));

        $validator
            ->integer('post1',__("郵便番号は数値となります。(前)"))
            ->notEmptyString('post1',__("郵便番号を入力してください。(前)"));

        $validator
            ->integer('post2',__("郵便番号は数値となります。(後)"))
            ->notEmptyString('post2',__("郵便番号を入力してください。(後)"));

        $validator
            ->scalar('city')
            ->maxLength('city', 512,__("市区町村が長すぎます。"))
            ->notEmptyString('city',__("市区町村を入力してください。"));

        $validator
            ->scalar('space')
            ->maxLength('space', 512,__("番地が長すぎます。"))
            ->notEmptyString('space',__("番地を入力してください。"));
/*
        $validator
            ->scalar('build')
            ->maxLength('build', 512)
            ->notEmptyString('build');
*/
        $validator
            ->integer('shop_type',__("店舗形態の形式に謝りがあります。"))
            ->notEmptyString('shop_type',__("店舗形態を入力してください。"));

        $validator
            ->integer('shop_area',__("店舗面積の形式に謝りがあります。"))
            ->notEmptyString('shop_area',__("店舗面積を入力してください。"));

        $validator
            ->integer('agreement',__("契約形態の形式に謝りがあります。"))
            ->notEmptyString('agreement',__("契約形態を入力してください。"));

        $validator
            ->integer('security_money',__("保証金の形式に謝りがあります。"))
            ->notEmptyString('security_money',__("保証金を入力してください。"));

        $validator
            ->integer('rent_money',__("賃料の形式に謝りがあります。"))
            ->notEmptyString('rent_money',__("賃料を入力してください。"));

        $validator
            ->integer('common_money',__("共益費の形式に謝りがあります。"))
            ->notEmptyString('common_money',__("共益費を入力してください。"));

        $validator
            ->integer('parking_count',__("駐車場台数の形式に謝りがあります。"))
            ->notEmptyString('parking_count',__("駐車場台数を入力してください。"));

        $validator
            ->integer('build_type',__("建物の形態の形式に謝りがあります。"))
            ->notEmptyString('build_type',__("建物の形態を選択してください。"));

        $validator
            ->integer('constract_type',__("建物の構造の形式に謝りがあります。"))
            ->notEmptyString('constract_type',__("建物の構造を選択してください。"));

        $validator
            ->scalar('uploadfile')
            ->maxLength('uploadfile', 512)
            ->allowEmptyFile('uploadfile');
/*
        $validator
            ->scalar('other')
            ->notEmptyString('other');
*/

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


/*
        $validator
            ->scalar('message')
            ->notEmptyString('message');

        $validator
            ->integer('status')
            ->notEmptyString('status');
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
