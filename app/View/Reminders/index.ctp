<h1> Reminders </h1>

<?php echo $this->Html->link('Add reminder', array('controller' => 'reminders', 'action' => 'add'), array('class' => 'btn btn-mini btn-primary ')); ?>

<h3> <p class="lead">Open Reminders</p> </h3>

<?php if(empty($toDoReminders)) echo '<i> No reminders yet.</i>'; ?>

<?php if($toDoReminders): ?>

	<div class="table-responsive">

		<table class='table table-striped table-condensed table-hover'>

					
			<thead>
				<tr>
					<th> Reminder </th>
					<th> Category </th>
					<th> Date </th>
					<th> Customer </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($toDoReminders as $reminder): ?>
					<tr>
						<!-- Reminder -->
						<td> 
							<?php echo $this->Html->link(ucfirst($reminder['Reminder']['title']), array('controller' => 'reminders', 'action' => 'view', $reminder['Reminder']['id'])); ?>
						</td>

						</td>

						<!-- Category -->
						<td>
							<?php echo $reminder['Category']['title']; ?>
						</td>

						<!-- Date -->
						<td>
							<?php echo date('l jS \of F Y h:i:s A', strtotime($reminder['Reminder']['date'])); ?>
						</td>

						<!-- Costumer -->
						<td>
							<?php echo $reminder['User']['username']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php echo $this->Html->link('Close', array('controller' => 'reminders', 'action' => 'close', $reminder['Reminder']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'reminders', 'action' => 'edit', $reminder['Reminder']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>

		</table>
		<!-- End toDoReminders -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>


<h3> <p class="lead">Closed reminders</p> </h3>

<?php if(empty($closedReminders)) echo '<i> No closed reminders yet.</i>'; ?>

<?php if ($closedReminders): ?>

	<div class="table-responsive">


		<table class='table table-striped table-condensed table-hover'>
		
			<thead>
				<tr>
					<th> Reminder </th>
					<th> Category </th>
					<th> Date </th>
					<th> Customer </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>
		
			<tbody>
				<?php foreach($closedReminders as $reminder): ?>
					<tr>
						<!-- Reminder -->
						<td> 
							<?php echo $this->Html->link(ucfirst($reminder['Reminder']['title']), array('controller' => 'reminders', 'action' => 'view', $reminder['Reminder']['id'])); ?>
						</td>

						<!-- Category -->
						<td>
							<?php echo $reminder['Reminder']['category_id']; ?>
						</td>
						
						<!-- Date -->
						<td>
							<?php echo date('l jS \of F Y h:i:s A', strtotime($reminder['Reminder']['date'])); ?>
						</td>

						<!-- Costumer -->
						<td>
							<?php echo $reminder['User']['username']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php echo $this->Html->link('Reopen', array('controller' => 'reminders', 'action' => 'reopen', $reminder['Reminder']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'reminders', 'action' => 'edit', $reminder['Reminder']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		
		</table>
		<!-- End doneReminders -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>
