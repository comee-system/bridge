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
?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | <?= $this->fetch('title') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= $this->Html->meta('icon') ?>

  <!-- Font Awesome -->
  <?= $this->Html->css('//pro.fontawesome.com/releases/v5.10.0/css/all.css') ?>
  <!-- Ionicons -->
  <?= $this->Html->css('//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') ?>
  <!-- icheck bootstrap -->
  <?= $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('/css/bootstrap.min.css') ?>
  <?= $this->Html->css('/css/basic.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <?= $this->Html->css('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') ?>

</head>

<body >
<!--
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
-->
    <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

<!-- jQuery -->
<?= $this->Html->script('//code.jquery.com/jquery-3.5.1.min.js') ?>
<!-- Bootstrap 4 -->
<?= $this->Html->script('/js/bootstrap.bundle.min.js') ?>
<?= $this->Html->script('/js/feather.min.js') ?>
<?= $this->Html->script('/js/Chart.min.js') ?>
<?= $this->Html->script('/js/dashboard.js') ?>



</body>
</html>
