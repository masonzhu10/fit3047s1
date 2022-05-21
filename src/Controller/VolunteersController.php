<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Volunteers Controller
 *
 * @property \App\Model\Table\VolunteersTable $Volunteers
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VolunteersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $volunteers = $this->paginate($this->Volunteers);

        $this->set(compact('volunteers'));
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $volunteer = $this->Volunteers->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('volunteer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $volunteer = $this->Volunteers->newEmptyEntity();
        if ($this->request->is('post')) {
            $volunteer = $this->Volunteers->patchEntity($volunteer, $this->request->getData());
            if ($this->Volunteers->save($volunteer)) {
                $this->Flash->success(__('The volunteer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The volunteer could not be saved. Please, try again.'));
        }
        $this->set(compact('volunteer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();

        $volunteer = $this->Volunteers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteer = $this->Volunteers->patchEntity($volunteer, $this->request->getData());
            if ($this->Volunteers->save($volunteer)) {
                $this->Flash->success(__('The volunteer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The volunteer could not be saved. Please, try again.'));
        }
        $this->set(compact('volunteer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['post', 'delete']);
        $volunteer = $this->Volunteers->get($id);
        if ($this->Volunteers->delete($volunteer)) {
            $this->Flash->success(__('The volunteer has been deleted.'));
        } else {
            $this->Flash->error(__('The volunteer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
