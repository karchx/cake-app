<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Curso Controller
 *
 */
class CursoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Curso->find();
        $cursos = $this->paginate($query);

        $this->set(compact('cursos'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Curso->get($id, contain: []);
        $this->set(compact('curso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Curso->newEmptyEntity();
        if ($this->request->is('post')) {
            $curso = $this->Curso->patchEntity($curso, $this->request->getData());
            if ($this->Curso->save($curso)) {
                $this->Flash->success(__('Curso agregado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El curso no se pudo agregar. Por favor, intenta nuevamente.'));
        }
        $this->set(compact('curso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Curso->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Curso->patchEntity($curso, $this->request->getData());
            if ($this->Curso->save($curso)) {
                $this->Flash->success(__('El curso ha sido editado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar el curso. Por favor, intente nuevamente.'));
        }
        $this->set(compact('curso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Curso->get($id);
        if ($this->Curso->delete($curso)) {
            $this->Flash->success(__('El curso ha sido eliminado'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el curso. Por favor, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
