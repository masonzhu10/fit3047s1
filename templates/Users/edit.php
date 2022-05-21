<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $volunteers
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 */
$this->layout = 'admin';

?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                echo $this->Form->control('email', array('class' => 'form-group col-md-3','maxlength'=>'25', 'type' => 'email'));
                echo $this->Form->control('password', array('class' => 'form-group col-md-3','maxlength'=>'25', 'type' => 'password'));
                    echo $this->Form->control('type', array('class' => 'form-group col-md-3','maxlength'=>'25', 'type' => 'text'));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), array('class' => 'btn primary')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>