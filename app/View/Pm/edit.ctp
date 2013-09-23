<div class="form col-md-7">
<?php echo $this->Form->create('Pm', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add pm reminder') ?> </legend>
		<?php 
			echo $this->Form->input('date', array('dateFormat' => 'MDY', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
			echo $this->Form->input('location', array('rows' => '2'));
		?>
	</fieldset>

	<?php echo $this->Form->end('Save', array('class' => 'btn btn-success')); ?>

</div>
<!-- End form -->