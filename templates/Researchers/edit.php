<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Researcher $researcher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $researcher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $researcher->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Researchers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="researchers form content">
            <?= $this->Form->create($researcher) ?>
            <fieldset>
                <legend><?= __('Edit Researcher') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('specialisation');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
