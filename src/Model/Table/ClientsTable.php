<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\HotelsTable|\Cake\ORM\Association\BelongsToMany $Hotels
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('client_id');
        $this->setPrimaryKey('client_id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Hotels', [
            'foreignKey' => 'client_id',
            'targetForeignKey' => 'hotel_id',
            'joinTable' => 'hotels_clients'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('client_id')
            ->allowEmpty('client_id', 'create');

        $validator
            ->scalar('client_nom')
            ->maxLength('client_nom', 255)
            ->requirePresence('client_nom', 'create')
            ->notEmpty('client_nom');

        $validator
            ->scalar('client_adresse')
            ->maxLength('client_adresse', 255)
            ->requirePresence('client_adresse', 'create')
            ->notEmpty('client_adresse');

        $validator
            ->scalar('client_ville')
            ->maxLength('client_ville', 255)
            ->requirePresence('client_ville', 'create')
            ->notEmpty('client_ville');

        $validator
            ->scalar('client_phone')
            ->maxLength('client_phone', 255)
            ->requirePresence('client_phone', 'create')
            ->notEmpty('client_phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
