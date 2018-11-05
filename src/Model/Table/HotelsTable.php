<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hotels Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\BelongsToMany $Clients
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 *
 * @method \App\Model\Entity\Hotel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hotel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hotel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hotel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hotel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hotel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hotel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hotel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HotelsTable extends Table
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
        $this->addBehavior('Translate', ['fields' => ['hotel_ville']]);
        $this->setTable('hotels');
        $this->setDisplayField('hotel_id');
        $this->setPrimaryKey('hotel_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('List_hotels', [
            'foreignKey' => 'listHotel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pays', [
            'foreignKey' => 'pays_code',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Clients', [
            'foreignKey' => 'hotel_id',
            'targetForeignKey' => 'client_id',
            'joinTable' => 'hotels_clients'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'hotel_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'hotels_files'
        ]);
        $this->belongsTo('Villes', [
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
            ->integer('hotel_id')
            ->allowEmpty('hotel_id', 'create');

        $validator
            ->scalar('hotel_nom')
            ->maxLength('hotel_nom', 255)
            ->requirePresence('hotel_nom', 'create')
            ->notEmpty('hotel_nom');

        $validator
            ->scalar('hotel_adresse')
            ->maxLength('hotel_adresse', 255)
            ->requirePresence('hotel_adresse', 'create')
            ->notEmpty('hotel_adresse');

        $validator
            ->scalar('hotel_codepostal')
            ->maxLength('hotel_codepostal', 255)
            ->requirePresence('hotel_codepostal', 'create')
            ->notEmpty('hotel_codepostal');

        $validator
            ->scalar('hotel_ville')
            ->maxLength('hotel_ville', 255)
            ->requirePresence('hotel_ville', 'create')
            ->notEmpty('hotel_ville');

        $validator
            ->scalar('hotel_url')
            ->maxLength('hotel_url', 255)
            ->requirePresence('hotel_url', 'create')
            ->notEmpty('hotel_url');

        $validator
            ->integer('pays_code')
            ->requirePresence('pays_code', 'create')
            ->notEmpty('pays_code');

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
