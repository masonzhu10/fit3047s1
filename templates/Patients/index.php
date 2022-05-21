<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient[]|\Cake\Collection\CollectionInterface $patients
 */
$this->layout = 'admin';
$this->Html->css('//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css', ['block' => true]);
$this->Html->script('//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', ['block' => true]);
?>
<div class="patients index content">
    <h4><?= __('Patients Record') ?></h4>
    <div class="table-responsive">
        <?=$this->Form->create(null,['url'=>['action'=>'deleteAll']])?>
        <?= $this->Form->button(__('Delete Selected'),array('class' => 'btn primary', 'confirm'=>'Are you sure you want to delete the selected patient?')) ?>
        <div class="filterContainer">
            <h4>Advanced Search</h4>
            <div class="filterGroup">
                <div>
                    <label for="minHeight">Minimum height (cm): </label>
                    <input type="text" id="minHeight" name="minHeight">
                </div>
                <div>
                    <label for="maxHeight">Maximum height (cm): </label>
                    <input type="text" id="maxHeight" name="maxHeight">
                </div>
            </div>

            <div class="filterGroup">
                <div>
                    <label for="minWeight">Minimum weight (kg): </label>
                    <input type="text" id="minWeight" name="minWeight">
                </div>
                <div>
                    <label for="maxWeight">Maximum weight (kg): </label>
                    <input type="text" id="maxWeight" name="maxWeight">
                </div>
            </div>

            <div class="filterGroup">
                <div>
                    <label for="minAge">Minimum age (years): </label>
                    <input type="number" id="minAge" name="minAge">
                </div>
                <div>
                    <label for="maxAge">Maximum age: (years)</label>
                    <input type="number" id="maxAge" name="maxAge">
                </div>
            </div>
            <button class="btn primary" id="clear">Clear Search</button>
        </div>

        <table id="patientTable" class="display">

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?=$this->Form->checkbox('ids[]',['value'=>$patient->id])?></td>
                    <td><?= h($patient->first_name) ?></td>
                    <td><?= h($patient->last_name) ?></td>
                    <td><?=h(rand(1,10)) ?></td>
                    <td><?= $this->Number->format($patient->height) ?></td>
                    <td><?= $this->Number->format($patient->weight) ?></td>
                    <td><?= h($patient->medicare_num) ?></td>
                    <td><?= h($patient->parent_name) ?></td>
                    <td><?= h($patient->phone_no) ?></td>
                    <td><?= h($patient->email) ?></td>
                    <td><?= h($patient->address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $patient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $patient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete patient: {0}?', $patient->first_name . ' ' . $patient->last_name)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?=$this->Form->end()?>
    </div>
</div>

<script>
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var min = parseInt($('#minWeight').val(), 10);
        var max = parseInt($('#maxWeight').val(), 10);
        var weight = parseFloat(data[5]) || 0; // use data for the weight column

        if ((isNaN(min) && isNaN(max)) ||
            (isNaN(min) && weight <= max) ||
            (min <= weight && isNaN(max)) ||
            (min <= weight && weight <= max)) {
            return true;
        }
        return false;
    },
    function(settings, data, dataIndex) {
        var min = parseInt($('#minHeight').val(), 10);
        var max = parseInt($('#maxHeight').val(), 10);
        var height = parseFloat(data[4]) || 0; // use data for the height column

        if ((isNaN(min) && isNaN(max)) ||
            (isNaN(min) && height <= max) ||
            (min <= height && isNaN(max)) ||
            (min <= height && height <= max)) {
            return true;
        }
        return false;
    },
    function(settings, data, dataIndex) {
        var min = parseInt($('#minAge').val(), 10);
        var max = parseInt($('#maxAge').val(), 10);
        var age = parseFloat(data[3]) || 0; // use data for the age column

        if ((isNaN(min) && isNaN(max)) ||
            (isNaN(min) && age <= max) ||
            (min <= age && isNaN(max)) ||
            (min <= age && age <= max)) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    var table = $('table.display').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#minWeight, #maxWeight').keyup(function() {
        table.draw();
    });
    $('#minHeight, #maxHeight').keyup(function() {
        table.draw();
    });
    $('#minAge, #maxAge').keyup(function() {
        table.draw();
    });
});
</script>
