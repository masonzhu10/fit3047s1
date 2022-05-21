<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$this->layout = 'admin';
?>
<div class="content">
    <legend><?= __('Edit Register Request') ?></legend>
    <?= $this->Form->create($request) ?>
    <div class="d-flex justify-content-between">
        <div class="PatientAddColumn">
            <?php
            echo $this->Form->control('first_name', array('class' => 'patientInput','maxlength'=>'30', 'type' => 'text'));
            echo $this->Form->control('dob', array('class' => '', 'type' => 'date'));
            echo $this->Form->control('current_med', array('class' => 'patientPlaceholder','maxlength'=>'100', 'type' => 'text'));
            echo $this->Form->control('allergies', array('class' => 'patientPlaceholder','maxlength'=>'100', 'type' => 'text'));
            echo $this->Form->control('email', array('class' => '','maxlength'=>'25', 'type' => 'email'));
            ?>
        </div>
        <div class="PatientAddColumn">
            <?php
            echo $this->Form->control('last_name', array('class' => 'patientInput','maxlength'=>'30', 'type' => 'text'));
            echo $this->Form->control('height', array('class' => 'patientInput','min'=>'0', 'max'=>'999', 'type' => 'number'));
            echo $this->Form->control('height', array('class' => '','min'=>'0', 'max'=>'999', 'type' => 'number'));
            echo $this->Form->control('weight', array('class' => '','min'=>'0', 'max'=>'999', 'type' => 'number'));
            echo $this->Form->control('medicare_num', array('class' => '','min'=>'0', 'max'=>'999999999999999', 'type' => 'text'));
            echo $this->Form->control('parent_name', array('class' => '','maxlength'=>'30', 'type' => 'text'));
            echo $this->Form->control('phone_no', array('class' => '', 'min'=>'0', 'max'=>'999999999999999', 'type' => 'text'));
            echo $this->Form->control('address', array('class' => '','maxlength'=>'50', 'type' => 'text'));
            echo $this->Form->control('password', array('class' => 'form-group col-md-3','maxlength'=>'25', 'type' => 'password'));
            ?>
        </div>
        <?= $this->Html->image('bear.jpg', ['alt' => 'bear image', 'class'=>'bear-img']) ?>

    </div>
    <div class="PatientAddSubmit">
        <a href="/requests/index"> <button class="btn primary">Back</button></a>
        <?= $this->Form->button(__('Submit'),array('class' => 'btn primary', 'confirm'=>'Are you sure you want to edit the Registers request?')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

