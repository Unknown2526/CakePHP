<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListHotels Model
 *
 * @method \App\Model\Entity\ListHotel get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListHotel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListHotel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListHotel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListHotel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListHotel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListHotel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListHotel findOrCreate($search, callable $callback = null, $options = [])
 */
class ListHotelsTable extends Table
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

        $this->setTable('list_hotels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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

        return $validator;
    }
}
