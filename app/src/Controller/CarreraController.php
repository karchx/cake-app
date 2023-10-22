<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Carrera Controller
 *
 */
class CarreraController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Carrera->find();
        $carreras = $this->paginate($query);

        $this->set(compact('carreras'));
    }

    /**
     * View method
     *
     * @param string|null $id Carrera id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carrera = $this->Carrera->get($id, contain: []);
        $this->set(compact('carrera'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carrera = $this->Carrera->newEmptyEntity();
        if ($this->request->is('post')) {
            $carrera = $this->Carrera->patchEntity($carrera, $this->request->getData());
            if ($this->Carrera->save($carrera)) {
                $this->Flash->success(__('Carrera agregada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La carrera no se pudo agregar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('carrera'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carrera id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carrera = $this->Carrera->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carrera = $this->Carrera->patchEntity($carrera, $this->request->getData());
            if ($this->Carrera->save($carrera)) {
                $this->Flash->success(__('La carrera ha sido editada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar la carrera. Por favor, intente nuevamente.'));
        }
        $this->set(compact('carrera'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carrera id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carrera = $this->Carrera->get($id);
        if ($this->Carrera->delete($carrera)) {
            $this->Flash->success(__('La carrera ha sido eliminada'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la carrera. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
