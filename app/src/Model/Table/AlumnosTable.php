<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alumnos Model
 *
 * @property \App\Model\Table\CarrerasTable&\Cake\ORM\Association\BelongsTo $Carreras
 * @property \App\Model\Table\CursoAprobadoAlumnoTable&\Cake\ORM\Association\HasMany $CursoAprobadoAlumno
 *
 * @method \App\Model\Entity\Alumno newEmptyEntity()
 * @method \App\Model\Entity\Alumno newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Alumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alumno findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Alumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alumno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AlumnosTable extends Table
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

        $this->setTable('alumnos');
        $this->setDisplayField('nombres');
        $this->setPrimaryKey('id');

        $this->belongsTo('Carreras', [
            'foreignKey' => 'carrera_id',
        ]);
        $this->hasMany('CursoAprobadoAlumno', [
            'foreignKey' => 'alumno_id',
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
            ->scalar('nombres')
            ->maxLength('nombres', 100)
            ->requirePresence('nombres', 'create')
            ->notEmptyString('nombres');

        $validator
            ->scalar('apellidos')
            ->maxLength('apellidos', 100)
            ->requirePresence('apellidos', 'create')
            ->notEmptyString('apellidos');

        $validator
            ->date('fecha_nacimiento')
            ->requirePresence('fecha_nacimiento', 'create')
            ->notEmptyDate('fecha_nacimiento');

        $validator
            ->scalar('fotografia')
            ->maxLength('fotografia', 50)
            ->requirePresence('fotografia', 'create')
            ->notEmptyString('fotografia');

        $validator
            ->nonNegativeInteger('carrera_id')
            ->allowEmptyString('carrera_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('carrera_id', 'Carreras'), ['errorField' => 'carrera_id']);

        return $rules;
    }
}
