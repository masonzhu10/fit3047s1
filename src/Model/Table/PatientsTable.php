<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PatientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('patients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');


         $this->hasMany('Users', [
             'foreignKey' => 'patient_id',
         ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255);

        $validator
            ->scalar('dob')
            ->maxLength('dob', 255);

        $validator
            ->integer('height');

        $validator
            ->integer('weight');

        $validator
            ->scalar('current_med');
        $validator
            ->scalar('allergies');
        $validator
            ->scalar('medicare_num')
            ->maxLength('medicare_num', 21);
        $validator
            ->scalar('parent_name')
            ->maxLength('parent_name', 255);

        $validator
            ->scalar('phone_no')
            ->maxLength('phone_no', 100);
        $validator
            ->email('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 255);

        return $validator;
    }
}
