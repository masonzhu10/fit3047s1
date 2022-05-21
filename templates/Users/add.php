<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $volunteers
 * @var \App\Model\Entity\Patient[]|\Cake\Collection\CollectionInterface $patients


 */
$this->layout = 'admin';
$type = array('volunteer' => 'Volunteer', 'patient' => 'Patient');

$patient = array(
    100 => 'Wade Oconnor',
    101 => 'Wang Franks',
    102 => 'Elliott Davenport',
    103 => 'Tasha Evert',
    104 => 'Guy FOx',
    105 => 'Maya Tran',
    106 => 'Brody Garner',
    107 => 'Jorden Steele',
    108 => 'India Ryan',
    109 => 'Abel Bradford',
    110 => 'Brenna Campos',
    111 => 'Amal Witt',
    112 => 'Hannah Mccormick',
    113 => 'Kaitlin Biden',
    114 => 'Koey Jones',
    115 => 'Sara EHarper',
    117 => 'Farrah Bright',
    118 => 'Oren Merrill',
    119 => 'Ralph Schroeder',
);


?>

<div class="row">
    <div class="column-responsive column-80">
        <div class="users form content mx-auto">
            <?= $this->Form->create($user) ?>
            <fieldset style="width: 45%; margin:auto;">
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('email', array('class' => 'form-group','maxlength'=>'50', 'type' => 'email'));
                    echo $this->Form->control('password', array('class' => 'form-group','maxlength'=>'25', 'type' => 'password'));
                    echo $this->Form->control('type', ['options' => $type, 'empty' => false, 'class' => 'form-group']);
                    echo $this->Form->control('patient_id', ['options' => $patient, 'empty' => true, 'class' => 'form-group']);
                ?>
            </fieldset>
            <div class="text-center">
            <?= $this->Form->button(__('Submit'), array('class' => 'btn primary')) ?>
            </div>
            <?= $this->Form->end() ?>

            <br>
        </div>
    </div>
</div>
