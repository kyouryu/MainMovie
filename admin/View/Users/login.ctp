<?php echo $this->Html->css('cake.generic', null, array('inline' => false)); ?>
<h1>サンプル２</h1>
<h2>ログイン</h2>

<?php echo $this->Form->create('User'); ?>

<?php echo $this->Form->input('username'); ?>

<?php echo $this->Form->input('password'); ?>

<?php echo $this->Form->end('　ログイン　'); ?>
