<div class="form col-md-5">
	<?php echo $this->Form->create('Category', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add category'); ?> </legend>
		<?php  
			echo $this->Form->create('Category');
			echo $this->Form->input('title');
			echo $this->Form->input('description', array('rows' => '5'));
			echo $this->Form->end('Save');
		?>
	</fieldset>


</div>
<!-- End form -->