<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<main>
  <div class="container">
  <?=$this->Form->create($member, [
    'type' => 'post',
    'url' => ['controller' => 'login', 'action' => 'index'],
  ]);?>
    <input type="text" name="username" value="" />
    <input type="text" name="password" value="" />


    <?=$this->Form->submit();?>
  <?=$this->Form->end()?>
  </div>
</main>
