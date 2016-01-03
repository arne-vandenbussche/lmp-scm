<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 */
class PersonsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('persons', $this->paginate($this->Persons));
        $this->set('_serialize', ['persons']);
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);
        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Persons->newEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('Deze persoon werd bewaard.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Deze persoon kon niet bewaard worden. Probeer opnieuw.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('Deze persoon werd bewaard.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Deze persoon kon niet bewaard worden. Probeer opnieuw.'));
            }
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('Deze persoon werd verwijderd.'));
        } else {
            $this->Flash->error(__('Deze persoon kon niet verwijderd worden. Probeer opnieuw.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
