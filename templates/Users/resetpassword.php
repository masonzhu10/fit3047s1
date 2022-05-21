

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <?= $this->Html->image('login profile.svg', ['alt' => 'profile icon', 'class'=>'col-lg-6 d-none d-lg-block']) ?>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome to CURE!</h1>
                                </div>
                                <div class="users form">
<?php echo $this->Flash->render() ?>
<?php echo $this->Form->create() ?>
<legend><?= __('Please enter your new password') ?></legend>
<?php 
                    echo $this->Form->control('password', array('class' => 'form-control','maxlength'=>'25', 'type' => 'password'));
 ?>
<?php
echo $this->Form->button('Reset Password',['class'=>'btn btn-primary btn-user btn-block']);
echo $this->Form->end()
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


