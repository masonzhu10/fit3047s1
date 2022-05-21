<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'admin';

?>
<div class="d-flex flex-column">
    <table class="table d-flex justify-content-center">
        <tr>
            <th><?= __('email') ?></th>
            <td><?= h($user->email) ?>
            </td>
        </tr>
        <tr>
            <th><?= __('type') ?></th>
            <td><?= h($user->type) ?>
            </td>
        </tr>
    </table>
    <a href="/users" class="text-center"><button class="btn primary">Back</button></a>
</div>