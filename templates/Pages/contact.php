<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Content[]|\Cake\Collection\CollectionInterface $contents
 */
?>

<div>
    <?= var_dump($contents) ?>
    <?php foreach ($contents as $content): ?>

    <p>If you would like to enquire about being a CURE volunteer or a patient of CURE please contact us and we will get back to you at our earliest</p>
    <p>Email: cure@CUREMECP2.cpm</p>
    <p>Phone:<?= h($content->phone) ?></p>
    
    <?php endforeach; ?>

</div>


