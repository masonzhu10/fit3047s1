<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Researchers Controller
 *
 * @property \App\Model\Table\ResearchersTable $Researchers
 * @method \App\Model\Entity\Researcher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResearchersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $researchers = $this->paginate($this->Researchers);

        $this->set(compact('researchers'));
    }

    /**
     * View method
     *
     * @param string|null $id Researcher id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $researcher = $this->Researchers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('researcher'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $researcher = $this->Researchers->newEmptyEntity();
        if ($this->request->is('post')) {
            $researcher = $this->Researchers->patchEntity($researcher, $this->request->getData());
            if ($this->Researchers->save($researcher)) {
                $this->Flash->success(__('The researcher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The researcher could not be saved. Please, try again.'));
        }
        $this->set(compact('researcher'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Researcher id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $researcher = $this->Researchers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $researcher = $this->Researchers->patchEntity($researcher, $this->request->getData());
            if ($this->Researchers->save($researcher)) {
                $this->Flash->success(__('The researcher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The researcher could not be saved. Please, try again.'));
        }
        $this->set(compact('researcher'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Researcher id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['post', 'delete']);
        $researcher = $this->Researchers->get($id);
        if ($this->Researchers->delete($researcher)) {
            $this->Flash->success(__('The researcher has been deleted.'));
        } else {
            $this->Flash->error(__('The researcher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
