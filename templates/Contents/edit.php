<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 * 
 */
$this->layout = 'admin';
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="contents form content">
            <?= $this->Form->create($content) ?>
            <fieldset style="width: 45%; margin:auto;">
                <legend><?= __('Edit Content') ?></legend>
                <?php
                    echo $this->Form->control('email', array('class' => 'form-group','maxlength'=>'50', 'type' => 'email'));
                    echo $this->Form->control('phone',  array('class' => 'form-group','maxlength'=>'50', 'type' => 'text'));
                    echo $this->Form->control('contactInfo',  array('class' => 'form-group','maxlength'=>'100', 'type' => 'text'));
                ?>
            </fieldset>
            <div class="text-center">
            <?= $this->Form->button(__('Submit'),array('class' => 'btn primary mt-3', 'confirm'=>'Are you sure you want to edit the contact page?')) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
