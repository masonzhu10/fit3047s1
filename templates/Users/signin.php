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
                                    <?= $this->Flash->render() ?>
                                    <?= $this->Form->create() ?>
                                    <fieldset>
                                        <legend><?= __('Please enter your Email and password') ?></legend>
                                        <?= $this->Form->control('email', ['required' => true, 'class'=> 'h-200']) ?>
                                        <?= $this->Form->control('password', ['required' => true, 'class'=> 'h-200']) ?>
                                    </fieldset>
                                    <?= $this->Form->button(__('Login'),array('class' => 'btn btn-primary btn-user btn-block')) ?>
                                    <?= $this->Form->end() ?>

                                    <?= $this->Html->link("Register", ['controller'=>'Requests','action' => 'add']) ?>
                                    <br>
                                    <?= $this->Html->link("Forgot Password", ['controller'=>'users','action' => 'forgotpassword']) ?>
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
