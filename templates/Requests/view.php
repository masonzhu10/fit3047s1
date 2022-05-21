<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$this->layout = 'admin';
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Register Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Register'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $register->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Register'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="d-flex flex-column">
        <table class="table d-flex justify-content-center">
            <tr>
                <th><?= __('First Name') ?></th>
                <td><?= h($request->first_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Last Name') ?></th>
                <td><?= h($request->last_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Dob') ?></th>
                <td><?= h($request->dob) ?></td>
            </tr>
            <tr>
                <th><?= __('Medicare Num') ?></th>
                <td><?= h($request->medicare_num) ?></td>
            </tr>
            <tr>
                <th><?= __('Parent Name') ?></th>
                <td><?= h($request->parent_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Phone No') ?></th>
                <td><?= h($request->phone_no) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($request->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Address') ?></th>
                <td><?= h($request->address) ?></td>
            </tr>
            <tr>
                <th><?= __('Height') ?></th>
                <td><?= $this->Number->format($request->height) ?></td>
            </tr>
            <tr>
                <th><?= __('Weight') ?></th>
                <td><?= $this->Number->format($request->weight) ?></td>
            </tr>
            <tr>
                <th><?=  __('Current Med') ?></th>
                <td><?= $this->Text->autoParagraph(h($request->current_med)); ?></td>
            </tr>
            <tr>
                <th><?= __('Allergies') ?></th>
                <td> <?= $this->Text->autoParagraph(h($request->allergies)); ?></td>
            </tr>
            <tr>
                <th><?= __('Password') ?></th>
                <td><?= h($request->password) ?></td>
            </tr>
            <tr>
                <th><?= __('Current Med') ?></th>
                <td><?= $this->Text->autoParagraph(h($request->current_med)); ?></td>
            </tr>
            <tr>
                <th><?= __('Current Med') ?></th>
                <td><?= $this->Text->autoParagraph(h($request->allergies)); ?></td>
            </tr>
        </table>
    </div>
</div>
</div>
