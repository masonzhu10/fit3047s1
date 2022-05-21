<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$this->layout = 'register';
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?= $this->Form->create($request) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->control('first_name', array('class' => 'form-control form-control-user','maxlength'=>'30', 'type' => 'text'));
                            echo $this->Form->control('last_name', array('class' => 'form-control form-control-user','maxlength'=>'30', 'type' => 'text'));
                            echo $this->Form->control('dob', array('class' => 'form-control form-control-user', 'type' => 'date'));
                            echo $this->Form->control('height', array('class' => 'form-control form-control-user','min'=>'0', 'max'=>'999', 'type' => 'number'));
                            echo $this->Form->control('weight', array('class' => 'form-control form-control-user','min'=>'0', 'max'=>'999', 'type' => 'number'));
                            echo $this->Form->control('current_med', array('class' => 'form-control form-control-user','maxlength'=>'100', 'type' => 'text'));
                            echo $this->Form->control('allergies', array('class' => 'form-control form-control-user','maxlength'=>'100', 'type' => 'text'));
                            echo $this->Form->control('medicare_num', array('class' => 'form-control form-control-user','min'=>'0', 'max'=>'999999999999999', 'type' => 'number'));
                            echo $this->Form->control('parent_name', array('class' => 'form-control form-control-user','maxlength'=>'30', 'type' => 'text'));
                            echo $this->Form->control('phone_no', array('class' => 'form-control form-control-user', 'min'=>'0', 'max'=>'999999999999999', 'type' => 'number'));
                            echo $this->Form->control('email', array('class' => 'form-control form-control-user','maxlength'=>'75', 'type' => 'text'));
                            echo $this->Form->control('address', array('class' => 'form-control form-control-user','maxlength'=>'50', 'type' => 'text'));
                            echo $this->Form->control('password', array('class' => 'form-control form-control-user','type' => 'password'));
                            echo $this->Form->control('retype_password',array('class' => 'form-control form-control-user','type' => 'password'));
                            ?>
                        </fieldset>
                        <div style="margin-top: 15px; text-align:center">
                            <a href="users/signin" class="btn btn-primary btn-user">back</a>
                            <?= $this->Form->button(__('Submit'),array('class' => 'btn btn-primary btn-user')) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

