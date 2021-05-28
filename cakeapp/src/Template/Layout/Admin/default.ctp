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
  <?= $this->Html->css('/css/base.css') ?>
  <?= $this->Html->css('/css/admin.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <?= $this->Html->css('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') ?>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body >

<?= $this->fetch('content') ?>
<!-- jQuery -->
<?= $this->Html->script('//code.jquery.com/jquery-3.5.1.min.js') ?>
<!-- Bootstrap 4 -->
<?= $this->Html->script('/js/bootstrap.bundle.min.js') ?>

<?php /*$this->Html->script('/js/feather.min.js') */?>


<?= $this->Html->script('/js/jquery.min.js') ?>
<?= $this->Html->script('/js/jquery-ui.min.js') ?>
<?= $this->Html->script('/js/jquery.ui.datepicker-ja.min.js') ?>



<?= $this->Html->script('/js/base.js') ?>



</body>
</html>
