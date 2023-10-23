<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Alumno Controller
 *
 */
class AlumnoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Alumno->find();
        $query
            ->select([
                'id',
                'nombres',
                'apellidos',
                'fecha_nacimiento',
                'fotografia',
                'carrera' => 'Carrera.descripcion'
            ])
            ->innerJoinWith('Carrera');

        $alumnos = $this->paginate($query);

        $this->set(compact('alumnos'));
    }

    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alumno = $this->Alumno->get($id, contain: []);
        $this->set(compact('alumno'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumno->newEmptyEntity();
        $carreras = $this->getCarreras();

        if ($this->request->is('post')) {
            $alumno = $this->Alumno->patchEntity($alumno, $this->request->getData());
            $attachment = $this->request->getData();
            if ($this->Alumno->save($alumno)) {
                $this->Flash->success(__('Alumno agregado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El alumno no se pudo agregar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('alumno', 'carreras'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumno->get($id, contain: []);
        $carreras = $this->getCarreras();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $alumno = $this->Alumno->patchEntity($alumno, $this->request->getData());
            if ($this->Alumno->save($alumno)) {
                $this->Flash->success(__('El alumno ha sido editada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar el alumno. Por favor, intente nuevamente.'));
        }
        $this->set(compact('alumno', 'carreras'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumno->get($id);
        if ($this->Alumno->delete($alumno)) {
            $this->Flash->success(__('El alumno ha sido eliminada'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el alumno. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function getCarreras()
    {
        $carreras = [];
        $carrerasDB = $this->fetchTable('Carrera')
                         ->find()
                         ->select(['id', 'descripcion'])
                         ->toArray();

        foreach ($carrerasDB as $carrera) {
            $carreras[$carrera->id] = $carrera->descripcion;
        }

        return $carreras;
    }
}
