<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pays Model
 *
 * @method \App\Model\Entity\Pay get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pay|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pay findOrCreate($search, callable $callback = null, $options = [])
 */
class PaysTable extends Table
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
        $this->addBehavior('Translate', ['fields' => ['pays_nom']]);
        $this->setTable('pays');
        $this->setDisplayField('pays_code');
        $this->setPrimaryKey('pays_code');
        
        $this->hasMany('Hotels', [
            'foreignKey' => 'pays_code'
        ]);
        $this->hasMany('Villes', [
            'foreignKey' => 'pays_code'
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
            ->integer('pays_code')
            ->allowEmpty('pays_code', 'create');

        $validator
            ->scalar('pays_devise')
            ->allowEmpty('pays_devise');

        $validator
            ->scalar('pays_nom')
            ->allowEmpty('pays_nom');

        return $validator;
    }
}
