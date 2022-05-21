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
            <?= $this->Html->link(__('Edit Researcher'), ['action' => 'edit', $researcher->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Researcher'), ['action' => 'delete', $researcher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researcher->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Researchers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Researcher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="researchers view content">
            <h3><?= h($researcher->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($researcher->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($researcher->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($researcher->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($researcher->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Specialisation') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($researcher->specialisation)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
