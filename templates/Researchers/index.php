<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Researcher[]|\Cake\Collection\CollectionInterface $researchers
 */
$this->layout = 'researcher';
?>
<div class="researchers index content">
    <?= $this->Html->link(__('New Researcher'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Researchers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($researchers as $researcher): ?>
                <tr>
                    <td><?= $this->Number->format($researcher->id) ?></td>
                    <td><?= h($researcher->first_name) ?></td>
                    <td><?= h($researcher->last_name) ?></td>
                    <td><?= h($researcher->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $researcher->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $researcher->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $researcher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researcher->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
