<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Record[]|\Cake\Collection\CollectionInterface $records
 */
?>
<div class="records index content">
    <?= $this->Html->link(__('New Record'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Records') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('research_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= $this->Number->format($record->id) ?></td>
                    <td><?= $record->has('user') ? $this->Html->link($record->user->id, ['controller' => 'Users', 'action' => 'view', $record->user->id]) : '' ?></td>
                    <td><?= $record->has('researcher') ? $this->Html->link($record->researcher->id, ['controller' => 'Researchers', 'action' => 'view', $record->researcher->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $record->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $record->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]) ?>
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
