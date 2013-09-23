<div class="form col-md-7">
<?php echo $this->Form->create('Battery', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add battery reminder') ?> </legend>
		<?php 
			echo $this->Form->input('batt_id', array('type' => 'number'));
			echo $this->Form->input('model');
			echo $this->Form->input('expiry_date', array('dateFormat' => 'MDY', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
			echo $this->Form->input('location', array('rows' => '2'));
			echo $this->Form->input('renew_cost');
		?>
	</fieldset>

	<?php echo $this->Form->end('Save', array('class' => 'btn btn-success')); ?>

</div>
<!-- End form -->