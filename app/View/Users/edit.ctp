<div class="users form col-md-5">
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend><?php echo __('Add User'); ?></legend>
	        <?php 
		        echo $this->Form->input('username', array('disabled' => 'true'));
		        echo $this->Form->input('email');
		        echo $this->Form->input('company');
		        // echo $this->Form->input('password');
		    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>