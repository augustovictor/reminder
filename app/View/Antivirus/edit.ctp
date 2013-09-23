<div class="form col-md-7">
<?php echo $this->Form->create('Antivirus', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add antivirus reminder') ?> </legend>
		<?php 
			echo $this->Form->input('num_users');
			echo $this->Form->input('renew_cost');
			echo $this->Form->input('av_expiry_date', array('dateFormat' => 'MDY', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
		?>
	</fieldset>

	<?php echo $this->Form->end('Save', array('class' => 'btn btn-success')); ?>

</div>
<!-- End form -->