<div class="form col-md-7">
<?php echo $this->Form->create('Antivirus', array('role' => 'form')); ?>
	<fieldset>
		<legend> <?php echo __('Add antivirus reminder') ?> </legend>
		<?php 
			if ($this->App->current_user_admin()) echo $this->Form->input('user_id');
			echo $this->Form->input('username');
			echo $this->Form->input('password', array('type' => 'text'));
			echo $this->Form->input('num_users');
			echo $this->Form->input('renew_cost');
			echo $this->Form->input('location', array('rows' => '2'));
			echo $this->Form->input('av_expiry_date', array('type' => 'text', 'id' => 'datepicker', 'dateFormat' => 'MDY', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
		?>
	</fieldset>

	<?php echo $this->Form->end('Save', array('class' => 'btn btn-success')); ?>

</div>
<!-- End form -->


<script>
	 $(document).ready(function(){
	                     $("#datepicker").datepicker(
	                    {
	                           dateFormat: 'yy-mm-dd',
	                           onSelect: function(dateText, inst){
	                                 $('#select_date').val(dateText);
	                          }
	                     }
	                     );
	        });
</script>