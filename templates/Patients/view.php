<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
$this->layout = 'patient';

?>
<div class="d-flex flex-column">
    <table class="table d-flex justify-content-center">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($patient->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($patient->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Dob') ?></th>
            <td><?= h($patient->dob) ?></td>
        </tr>
        <tr>
            <th><?= __('Medicare Num') ?></th>
            <td><?= h($patient->medicare_num) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Name') ?></th>
            <td><?= h($patient->parent_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone No') ?></th>
            <td><?= h($patient->phone_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($patient->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($patient->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Height') ?></th>
            <td><?= $this->Number->format($patient->height) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($patient->weight) ?></td>
        </tr>
        <tr>
            <th><?=  __('Current Med') ?></th>
            <td><?= $this->Text->autoParagraph(h($patient->current_med)); ?></td>
        </tr>
        <tr>
            <th><?= __('Allergies') ?></th>
            <td> <?= $this->Text->autoParagraph(h($patient->allergies)); ?></td>
        </tr>
    </table>
    <!-- <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($patient->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Volunteer Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->type) ?></td>
                            <td><?= h($users->volunteer_id) ?></td>
                            <td><?= h($users->patient_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div> -->
    <a href="<?php
    if($user->type === "patient"){
        echo("/patients/edit/".$user->patient_id);

    }else{
        echo("/patients/edit/".$patient->id);
    }
    ?>" class="text-center"><button class="btn primary">Edit</button></a>

</div>
