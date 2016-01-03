<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LmpUsers Controller
 *
 * @property \App\Model\Table\LmpUsersTable $LmpUsers
 */
class LmpUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('lmpUsers', $this->paginate($this->LmpUsers));
        $this->set('_serialize', ['lmpUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Lmp User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lmpUser = $this->LmpUsers->get($id, [
            'contain' => []
        ]);
        $this->set('lmpUser', $lmpUser);
        $this->set('_serialize', ['lmpUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lmpUser = $this->LmpUsers->newEntity();
        if ($this->request->is('post')) {
            $lmpUser = $this->LmpUsers->patchEntity($lmpUser, $this->request->data);
            if ($this->LmpUsers->save($lmpUser)) {
                $this->Flash->success(__('The lmp user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lmp user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('lmpUser'));
        $this->set('_serialize', ['lmpUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lmp User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lmpUser = $this->LmpUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lmpUser = $this->LmpUsers->patchEntity($lmpUser, $this->request->data);
            if ($this->LmpUsers->save($lmpUser)) {
                $this->Flash->success(__('The lmp user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The lmp user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('lmpUser'));
        $this->set('_serialize', ['lmpUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lmp User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lmpUser = $this->LmpUsers->get($id);
        if ($this->LmpUsers->delete($lmpUser)) {
            $this->Flash->success(__('The lmp user has been deleted.'));
        } else {
            $this->Flash->error(__('The lmp user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
