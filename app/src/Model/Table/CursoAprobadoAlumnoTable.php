<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursoAprobadoAlumno Model
 *
 * @property \App\Model\Table\AlumnosTable&\Cake\ORM\Association\BelongsTo $Alumnos
 * @property \App\Model\Table\SemestresTable&\Cake\ORM\Association\BelongsTo $Semestres
 * @property \App\Model\Table\SeccionesTable&\Cake\ORM\Association\BelongsTo $Secciones
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsTo $Cursos
 *
 * @method \App\Model\Entity\CursoAprobadoAlumno newEmptyEntity()
 * @method \App\Model\Entity\CursoAprobadoAlumno newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoAprobadoAlumno[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CursoAprobadoAlumnoTable extends Table
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

        $this->setTable('curso_aprobado_alumno');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->setDisplayField('nota');

        $this->belongsTo('Alumno', [
            'foreignKey' => 'alumno_id',
        ]);
        $this->belongsTo('Semestre', [
            'foreignKey' => 'semestre_id',
        ]);
        $this->belongsTo('Seccion', [
            'foreignKey' => 'seccion_id',
        ]);
        $this->belongsTo('Curso', [
            'foreignKey' => 'curso_id',
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
            ->nonNegativeInteger('alumno_id')
            ->allowEmptyString('alumno_id');

        $validator
            ->nonNegativeInteger('semestre_id')
            ->allowEmptyString('semestre_id');

        $validator
            ->nonNegativeInteger('seccion_id')
            ->allowEmptyString('seccion_id');

        $validator
            ->nonNegativeInteger('curso_id')
            ->allowEmptyString('curso_id');

        $validator
            ->scalar('nota')
            ->requirePresence('nota', 'create');

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
        $rules->add($rules->existsIn('alumno_id', 'Alumno'), ['errorField' => 'alumno_id']);
        $rules->add($rules->existsIn('semestre_id', 'Semestre'), ['errorField' => 'semestre_id']);
        $rules->add($rules->existsIn('seccion_id', 'Seccion'), ['errorField' => 'seccion_id']);
        $rules->add($rules->existsIn('curso_id', 'Curso'), ['errorField' => 'curso_id']);

        return $rules;
    }
}
