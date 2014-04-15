<div class="users form col-md-5">
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend><?php echo __('Add User'); ?></legend>
	        <?php 
		        echo $this->Form->input('username');
		        echo $this->Form->input('email');
		        echo $this->Form->input('company');
		        // echo $this->Form->input('password');
		        echo $this->Form->input('role', array(
		            'options' => array('customer' => 'Customer')
		        ));
		    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>