<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Semestre Controller
 *
 */
class SemestreController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Semestre->find();
        $semestres = $this->paginate($query);

        $this->set(compact('semestres'));
    }

    /**
     * View method
     *
     * @param string|null $id Semestre id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semestre = $this->Semestre->get($id, contain: []);
        $this->set(compact('semestre'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semestre = $this->Semestre->newEmptyEntity();
        if ($this->request->is('post')) {
            $semestre = $this->Semestre->patchEntity($semestre, $this->request->getData());
            if ($this->Semestre->save($semestre)) {
                $this->Flash->success(__('Semestre agregado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El semestre no se pudo agregar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('semestre'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Semestre id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semestre = $this->Semestre->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semestre = $this->Semestre->patchEntity($semestre, $this->request->getData());
            if ($this->Semestre->save($semestre)) {
                $this->Flash->success(__('El semestre ha sido editada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El semestre no se pudo editar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('semestre'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Semestre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semestre = $this->Semestre->get($id);
        if ($this->Semestre->delete($semestre)) {
            $this->Flash->success(__('El semestre ha sido eliminada'));
        } else {
            $this->Flash->error(__('El semestre no se pudo eliminar. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
