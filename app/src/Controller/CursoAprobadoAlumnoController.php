<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * CursoAprobadoAlumno Controller
 *
 * @property \App\Model\Table\CursoAprobadoAlumnoTable $CursoAprobadoAlumno
 */
class CursoAprobadoAlumnoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CursoAprobadoAlumno->find()
            ->contain(['Alumno', 'Semestre', 'Seccion', 'Curso']);

        $cursoAprobadoAlumno = $this->paginate($query);

        $this->set(compact('cursoAprobadoAlumno'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso Aprobado Alumno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $query = $this->CursoAprobadoAlumno->find();
        $query
            ->select([
                'id',
                'alumno' => 'CONCAT(Alumno.apellidos, " ", Alumno.nombres)',
                'seccion' => 'Seccion.descripcion',
                'semestre' => 'Semestre.descripcion',
                'curso' => 'Curso.descripcion',
                'nota'
            ])
            ->where(['alumno_id' => $id])
            ->orderBy(['CursoAprobadoAlumno.id' => 'ASC'])
            ->innerJoinWith('Alumno')
            ->innerJoinWith('Seccion')
            ->innerJoinWith('Semestre')
            ->innerJoinWith('Curso');

        $cursoAprobadoAlumno = $this->paginate($query);
        $alumnoQuery = $this->fetchTable('Alumno')->find()
            ->where(['id' => $id])
            ->first();

        $alumno = $alumnoQuery->nombres . " " . $alumnoQuery->apellidos;
        $alumnoID = $alumnoQuery->id;

        $this->set(compact('cursoAprobadoAlumno', 'alumno', 'alumnoID'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($alumno_id)
    {
        $cursoAprobadoAlumno = $this->CursoAprobadoAlumno->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['alumno_id'] = $alumno_id;
            $cursoAprobadoAlumno = $this->CursoAprobadoAlumno->patchEntity($cursoAprobadoAlumno, $data);
            if ($this->CursoAprobadoAlumno->save($cursoAprobadoAlumno)) {
                $this->Flash->success(__('El curso aprobado se le agrego al alumno.'));

                return $this->redirect(['action' => 'view',$alumno_id]);
            }
            $this->Flash->error(__('Hubo un error, por favor, intenta otra vez.'));
        }
        $semestres = $this->getSelects('Semestre');
        $secciones = $this->getSelects('Seccion');
        $cursos = $this->getSelects('Curso');
        $this->set(compact('cursoAprobadoAlumno', 'semestres', 'secciones', 'cursos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso Aprobado Alumno id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $alumnoID = null)
    {
        $cursoAprobadoAlumno = $this->CursoAprobadoAlumno->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursoAprobadoAlumno = $this->CursoAprobadoAlumno->patchEntity($cursoAprobadoAlumno, $this->request->getData());
            if ($this->CursoAprobadoAlumno->save($cursoAprobadoAlumno)) {
                $this->Flash->success(__('El curso ha sido editado.'));

                return $this->redirect(['action' => 'view', $alumnoID]);
            }
            $this->Flash->error(__('The curso aprobado alumno could not be saved. Please, try again.'));
        }

        $semestres = $this->getSelects('Semestre');
        $secciones = $this->getSelects('Seccion');
        $cursos = $this->getSelects('Curso');
        $this->set(compact('cursoAprobadoAlumno', 'semestres', 'secciones', 'cursos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso Aprobado Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $alumnoID = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursoAprobadoAlumno = $this->CursoAprobadoAlumno->get($id);
        if ($this->CursoAprobadoAlumno->delete($cursoAprobadoAlumno)) {
            $this->Flash->success(__('Registro eliminado.'));
        } else {
            $this->Flash->error(__('The curso aprobado alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $alumnoID]);
    }

    private function getSelects(string $table): array
    {
        $data = [];
        $result = $this->fetchTable($table)->find()->all();

        foreach ($result as $row) {
            $data[$row->id] = $row->descripcion;
        }

        return $data;
    }
}
