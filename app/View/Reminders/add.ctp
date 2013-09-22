<div class="form col-md-5">
<?php echo $this->Form->create('Reminder', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add Reminder') ?> </legend>
		<?php 
			echo $this->Form->input('category_id', array('options' => array($categories)));
			echo $this->Form->input('title');
			echo $this->Form->input('description');
			echo $this->Form->input('date', array('dateFormat' => 'MDY', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
		?>
	</fieldset>

	<?php echo $this->Form->end('Save', array('class' => 'btn btn-success')); ?>

</div>
<!-- End form -->