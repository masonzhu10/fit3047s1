<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
$this->layout = 'admin';
$this->Html->css('//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css', ['block' => true]);
$this->Html->script('//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', ['block' => true]);
?>
<div class="register index content">
    <h3><?= __('Register') ?></h3>
    <div class="table-responsive">
        <table id="registerTable" class="display">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Medicare no</th>
                <th>Parent Name</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $this->Number->format($request->id) ?></td>
                    <td><?= h($request->first_name) ?></td>
                    <td><?= h($request->last_name) ?></td>
                    <td><?= h($request->dob) ?></td>
                    <td><?= $this->Number->format($request->height) ?></td>
                    <td><?= $this->Number->format($request->weight) ?></td>
                    <td><?= h($request->medicare_num) ?></td>
                    <td><?= h($request->parent_name) ?></td>
                    <td><?= h($request->phone_no) ?></td>
                    <td><?= h($request->email) ?></td>
                    <td><?= h($request->address) ?></td>
                    <td><?= h($request->password) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->first_name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<script>
    $(document).ready( function () {
        $('#registerTable').DataTable();
    } );
</script>

