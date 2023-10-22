<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carreras Model
 *
 * @property \App\Model\Table\AlumnosTable&\Cake\ORM\Association\HasMany $Alumnos
 *
 * @method \App\Model\Entity\Carrera newEmptyEntity()
 * @method \App\Model\Entity\Carrera newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Carrera[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carrera get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carrera findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Carrera patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carrera[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carrera|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carrera saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carrera[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carrera[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carrera[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carrera[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarreraTable extends Table
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

        $this->setTable('carreras');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');
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
            ->scalar('descripcion')
            ->maxLength('descripcion', 25)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        return $validator;
    }
}
