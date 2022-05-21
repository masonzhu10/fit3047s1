<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin</title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['bootstrap','normalize.min', 'cake', 'index','sb-admin-2.min.css']) ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css')?>
    <?= $this->Html->script('sb-admin-2.min.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <?= $this->Html->image('logo.jpg', ['alt' => 'cure logo', 'class'=>'logo']) ?>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/"
                        class="nav-link <?php if($this->request->getParam('pass')[0]==='home'){echo 'active';}?>"
                        aria-current="page">Home</a>
                </li>
                <li class="nav-item"><a href="/aboutmecp2"
                        class="nav-link <?php if($this->request->getParam('pass')[0]==='aboutmecp2'){echo 'active';}?>">About
                        MECP2</a>
                </li>
                <li class="nav-item"><a href="/post"
                        class="nav-link <?php if($this->request->getParam('pass')[0]==='post'){echo 'active';}?>">
                        Post</a>
                </li>
                <li class="nav-item"><a href="/Users/login"
                        class="nav-link <?php if($this->request->getParam('pass')[0]==='login'){echo 'active';}?>">Login</a>
                </li>
                <!-- <li class="nav-item"><a href="/cake" class="nav-link">CAKE</a>
            </li>-->

            </ul>
        </header>
    </div>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <div class=" container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <?= $this->Html->image('logo.jpg', ['alt' => 'cure logo', 'class'=>'logo']) ?>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" style="font-size: 20px;">
                <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/401project" target="_blank"><i
                            class="fa-lg fa-brands fa-facebook"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/channel/UCjP6hYYLfOjfI846dGHW3Yw"
                        target="_blank"><i class="fa-lg fa-brands fa-youtube"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/curemds/" target="_blank"><i
                            class="fa-lg fa-brands fa-instagram-square"></i></a>
                </li>
            </ul>
        </footer>
    </div>
</body>

</html>