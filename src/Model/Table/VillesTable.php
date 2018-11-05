<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Villes Model
 *
 * @method \App\Model\Entity\Ville get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ville newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ville[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ville|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ville|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ville patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ville[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ville findOrCreate($search, callable $callback = null, $options = [])
 */
class VillesTable extends Table
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

        $this->setTable('villes');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Pays', [
            'foreignKey' => 'pays_code'
        ]);
        $this->hasMany('Hotels', [
            'foreignKey' => 'ville_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->integer('pays_code')
            ->requirePresence('pays_code', 'create')
            ->notEmpty('pays_code');

        return $validator;
    }
}
