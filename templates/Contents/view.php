<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content $content
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="contents view content">
            <h3>Contact Info</h3>
            <p><?= h($content->contactInfo) ?></p>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($content->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($content->phone) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
