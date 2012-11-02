<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>