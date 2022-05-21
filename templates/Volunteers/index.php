<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Volunteer[]|\Cake\Collection\CollectionInterface $volunteers
 */
?>
<div class="volunteers index content">
    <?= $this->Html->link(__('New Volunteer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Volunteers') ?></h3>
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
                <?php foreach ($volunteers as $volunteer): ?>
                <tr>
                    <td><?= $this->Number->format($volunteer->id) ?></td>
                    <td><?= h($volunteer->first_name) ?></td>
                    <td><?= h($volunteer->last_name) ?></td>
                    <td><?= h($volunteer->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $volunteer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteer->id)]) ?>
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
