<h1> Pms </h1>

<?php if ($this->App->current_user_admin()) echo $this->Html->link('Add pm reminder', array('controller' => 'pms', 'action' => 'add'), array('class' => 'btn btn-mini btn-primary ')); ?>

<h3> <p class="lead">Open Pm</p> </h3>

<?php if(empty($toDoPm)) echo '<i> No pm reminders yet.</i>'; ?>

<?php if($toDoPm): ?>

	<div class="table-responsive">

		<table class='table table-striped table-condensed table-hover'>

					
			<thead>
				<tr>
					<?php if ($this->App->current_user_admin()) echo '<th>' . $this->Paginator->sort('User.username', 'Client') . '</th>'; ?>
					<th> <?php echo $this->Paginator->sort('User.company', 'Company'); ?> </th>
					<th> <?php echo $this->Paginator->sort('date'); ?> </th>
					<th><?php echo $this->Paginator->sort('location'); ?> </th>
					<?php if ($this->App->current_user_admin()): ?>
						<th class="text-right"> Actions </th>
					<?php endif; ?>
				</tr>
			</thead>

			<tbody>
				<?php foreach($toDoPm as $pm): ?>
					<tr class="<?php echo $this->App->shouldBeClosed($pm['Pm']['date']); ?>">
						<!-- Costumer -->
						<?php if ($this->App->current_user_admin()): ?>
							<td>
								<?php echo $this->Html->link($pm['User']['username'], array('controller' => 'users', 'action' => 'view', $pm['User']['id'])); ?>
							</td>
						<?php endif; ?>

						<!-- Company -->
						<td>
							<?php echo $pm['User']['company']; ?>
						</td>

						<!-- Date -->
						<td>
							<?php echo date('Y/m/d', strtotime($pm['Pm']['date'])); ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $pm['Pm']['location']; ?>
						</td>

						<!-- Actions -->
						<?php if ($this->App->current_user_admin()): ?>
							<td class="text-right">
								<?php if ($this->App->current_user_admin()) echo $this->Html->link('Close', array('controller' => 'pms', 'action' => 'close', $pm['Pm']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
								<?php echo $this->Html->link('Edit', array('controller' => 'pms', 'action' => 'edit', $pm['Pm']['id']), array('class' => 'btn btn-success btn-xs')); ?>
								<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $pm['Pm']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach;?>
			</tbody>

		</table>
		<!-- End toDoPm -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>


<h3> <p class="lead">Closed pm</p> </h3>

<?php if(empty($closedPm)) echo '<i> No closed pm reminders yet.</i>'; ?>

<?php if ($closedPm): ?>

	<div class="table-responsive">


		<table class='table table-striped table-condensed table-hover'>
		
			<thead>
				<tr>
					<?php if ($this->App->current_user_admin()) echo '<th> Customer </th>'; ?>
					<th> <?php echo $this->Paginator->sort('User.company', 'Company'); ?> </th>
					<th> Date </th>
					<th> Location </th>
					<?php if ($this->App->current_user_admin()): ?>
						<th class="text-right"> Actions </th>
					<?php endif; ?>
				</tr>
			</thead>
		
			<tbody>
				<?php foreach($closedPm as $pm): ?>
					<tr>
						<!-- Costumer -->
						<?php if ($this->App->current_user_admin()): ?>
							<td>
								<?php echo $this->Html->link($pm['User']['username'], array('controller' => 'users', 'action' => 'view', $pm['User']['id'])); ?>
							</td>
						<?php endif; ?>

						<!-- Company -->
						<td>
							<?php echo $pm['User']['company']; ?>
						</td>

						<!-- Date -->
						<td>
							<?php echo date('Y/m/d', strtotime($pm['Pm']['date'])); ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $pm['Pm']['location']; ?>
						</td>

						<!-- Actions -->
						<?php if ($this->App->current_user_admin()): ?>
							<td class="text-right">
								<?php if ($this->App->current_user_admin()) echo $this->Html->link('Reopen', array('controller' => 'pms', 'action' => 'reopen', $pm['Pm']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
								<?php echo $this->Html->link('Edit', array('controller' => 'pms', 'action' => 'edit', $pm['Pm']['id']), array('class' => 'btn btn-success btn-xs')); ?>
								<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $pm['Pm']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		
		</table>
		<!-- End donePm -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>
