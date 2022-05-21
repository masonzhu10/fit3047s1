<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Utility\Security;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['index','signin','add','forgotpassword','resetpassword']);
    }

    public function resetpassword($token){
        $this->Authorization->skipAuthorization();
        if($this->request->is('post')){
            $mypass=$this->request->getData('password');
//            $email=$this->request->getData('email');

            $user= $this->Users->findByToken($token)->first();
//            $usersTable = TableRegistry::get('Users');
//            $user = $usersTable
//                ->find('all')
//                ->where(['email'=>$email])
//                ->first();;
            $user->password=$mypass;
            if($this->Users->save($user)){
                return $this->redirect(['action'=>'signin']);
            }
        }

    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $volunteers = $this->Users->Volunteers->find('list', ['limit' => 200])->all();
        $patients = $this->Users->Patients->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'volunteers', 'patients'));
    }
    public function forgotpassword(){
        $this->Authorization->skipAuthorization();
        if($this->request->is('post')){
            $myemail=$this->request->getData('email');
            $mytoken=Security::hash(Security::randomBytes(25));

            $user= $this->Users->findByEmail($myemail)->first();
//            $usersTable=TableRegistry::get('Users');
//            $user = $usersTable
//                ->find('all')
//                ->where(['email'=>$myemail])
//                ->first();
            $user->password='';
            $user->token = $mytoken;
            if($this->Users->save($user)){
                $this->Flash->success('Reset password link has been sent to your email address ('.$myemail.') , please check your inbox');

                TransportFactory::setConfig('manual', [
                    'host' => 'mail.u22s1007.monash-ie.me',
                    'port' => 587,
                    'username' => 'curemds@u22s1007.monash-ie.me',
                    'password' => 'passwordteam7',
                    'className' => 'Smtp',
                    'tls' => true
                ]);

                $email= new Mailer('default');
                $email->setTransport('manual');
                $email->setEmailFormat('html');
                $email->setFrom('curemds@u22s1007.monash-ie.me','CURE');
                $email->setSubject('Please confirm your reset password request');
                $email->setTo($myemail);
                $email->deliver('Hello '.$myemail.'<br/>Please click link below to reset your password<br/><br/><a href="https://dev.u22s1007.monash-ie.me/users/resetpassword/'.$mytoken.'">Reset Password</a>');

            }
        }

    }

    public function signin()
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $type=$this->Authentication->getIdentity()->get('type');
            if($type =='volunteer'){
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'admin']);
            }
            else{
                if($type =='researcher'){
                    return $this->redirect(['controller' => 'Researchers', 'action' => 'index']);
                }
                else if($type =='patient'){
                    return $this->redirect('/patients/view/'.$this->Authentication->getIdentity()->get('patient_id'));
                }

            }
        }

        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }
    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'signin']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Volunteers', 'Patients'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['Volunteers', 'Patients'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $volunteers = $this->Users->Volunteers->find('list', ['limit' => 200])->all();
        $patients = $this->Users->Patients->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'volunteers', 'patients'));
    }



    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();


        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function password_confirm(){
        if ($this->data['Requests']['password'] !== $this->data['Requests']['password_confirmation']){
            return false;
        }
        return true;
    }

}

