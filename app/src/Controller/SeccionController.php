<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Seccion Controller
 *
 */
class SeccionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Seccion->find();
        $secciones = $this->paginate($query);

        $this->set(compact('secciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Seccion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seccion = $this->Seccion->get($id, contain: []);
        $this->set(compact('seccion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seccion = $this->Seccion->newEmptyEntity();
        if ($this->request->is('post')) {
            $seccion = $this->Seccion->patchEntity($seccion, $this->request->getData());
            if ($this->Seccion->save($seccion)) {
                $this->Flash->success(__('Seccion agregada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La seccion no se pudo agregar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('seccion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Seccion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seccion = $this->Seccion->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seccion = $this->Seccion->patchEntity($seccion, $this->request->getData());
            if ($this->Seccion->save($seccion)) {
                $this->Flash->success(__('La seccion ha sido editada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar la seccion. Por favor, intente nuevamente.'));
        }
        $this->set(compact('seccion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Seccion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seccion = $this->Seccion->get($id);
        if ($this->Seccion->delete($seccion)) {
            $this->Flash->success(__('La seccion ha sido eliminada'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la seccion. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
