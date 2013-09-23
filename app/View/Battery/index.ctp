<h1> Batteries </h1>

<?php echo $this->Html->link('Add battery reminder', array('controller' => 'batteries', 'action' => 'add'), array('class' => 'btn btn-mini btn-primary ')); ?>

<h3> <p class="lead">Open Battery</p> </h3>

<?php if(empty($toDoBattery)) echo '<i> No battery reminders yet.</i>'; ?>

<?php if($toDoBattery): ?>

	<div class="table-responsive">

		<table class='table table-striped table-condensed table-hover'>

					
			<thead>
				<tr>
					<th> Customer </th>
					<th> Battery id </th>
					<th> Expiry date </th>
					<th> Model </th>
					<th> Replace cost </th>
					<th> Location </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($toDoBattery as $battery): ?>
					<tr class="<?php echo $this->App->shouldBeClosed($battery['Battery']['expiry_date']); ?>">
						<!-- Costumer -->
						<td>
							<?php echo $battery['User']['username']; ?>
						</td>

						<!-- Battery id -->
						<td>
							<?php echo $battery['Battery']['batt_id']; ?>
						</td>

						<!-- Expiry date -->
						<td>
							<?php echo date('l jS \of F', strtotime($battery['Battery']['expiry_date'])); ?>
						</td>

						<!-- Model -->
						<td>
							<?php echo $battery['Battery']['model']; ?>
						</td>

						<!-- Replace cost -->
						<td>
							<?php echo $battery['Battery']['replace_cost']; ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $battery['Battery']['location']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php if ($this->App->current_user_admin()) echo $this->Html->link('Close', array('controller' => 'batteries', 'action' => 'close', $battery['Battery']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'batteries', 'action' => 'edit', $battery['Battery']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $battery['Battery']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>

		</table>
		<!-- End toDoBattery -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>


<h3> <p class="lead">Closed battery</p> </h3>

<?php if(empty($closedBattery)) echo '<i> No closed battery reminders yet.</i>'; ?>

<?php if ($closedBattery): ?>

	<div class="table-responsive">


		<table class='table table-striped table-condensed table-hover'>
		
			<thead>
				<tr>
					<th> Customer </th>
					<th> Battery id </th>
					<th> Expiry date </th>
					<th> Model </th>
					<th> Replace cost </th>
					<th> Location </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>
		
			<tbody>
				<?php foreach($closedBattery as $battery): ?>
					<tr>
						<!-- Costumer -->
						<td>
							<?php echo $battery['User']['username']; ?>
						</td>

						<!-- Battery id -->
						<td>
							<?php echo $battery['Battery']['batt_id']; ?>
						</td>

						<!-- Expiry date -->
						<td>
							<?php echo date('l jS \of F', strtotime($battery['Battery']['expiry_date'])); ?>
						</td>

						<!-- Model -->
						<td>
							<?php echo $battery['Battery']['model']; ?>
						</td>

						<!-- Replace cost -->
						<td>
							<?php echo $battery['Battery']['replace_cost']; ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $battery['Battery']['location']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php echo $this->Html->link('Reopen', array('controller' => 'batteries', 'action' => 'reopen', $battery['Battery']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'batteries', 'action' => 'edit', $battery['Battery']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $battery['Battery']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		
		</table>
		<!-- End doneBattery -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>
