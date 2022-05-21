<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->layout = 'admin';
?>
<div class="content">
    <h4><?= __('Users') ?></h4>
    <div class="table-responsive">
        <table class="table d-flex justify-content-center">
            <tr>
                <th>email</th>
                <th>type</th>
                <th>action</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user: {0}?', $user->email)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>