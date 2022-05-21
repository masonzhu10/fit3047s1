<?php
declare(strict_types=1);

namespace App\Controller;
use Authorization\Policy\Result;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $patient = $this->Patients->newEmptyEntity();
        $this->Authorization->authorize($patient);
        $patients = $this->Patients->find('all');

        $this->set(compact('patients'));
        $this->set("user", $this->Authentication->getIdentity());
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $patient = $this->Patients->get($id, [
            'contain' => ['Users'],
        ]);
        $this->Authorization->authorize($patient);

        $this->set(compact('patient'));
        $this->set("user", $this->Authentication->getIdentity());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $patient = $this->Patients->newEmptyEntity();
        $this->Authorization->authorize($patient);

        $patient = $this->Patients->newEmptyEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());

            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $this->set(compact('patient'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();

        $patient = $this->Patients->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($patient);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'view/'.$id]);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $this->set(compact('patient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $patient = $this->Patients->newEmptyEntity();
        $this->Authorization->authorize($patient);

        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function deleteAll(){
        $this->Authorization->skipAuthorization();
        $patient = $this->Patients->newEmptyEntity();
        $this->Authorization->authorize($patient);

        $this->request->allowMethod(['post', 'delete']);
        $ids= $this->request->getData('ids');

        if($this->Patients->deleteAll(['Users.id IN'=>$ids])){
            $this->Flash->success(__('The user has been deleted.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
