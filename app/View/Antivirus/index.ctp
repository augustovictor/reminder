<h1> Antivirus </h1>

<?php echo $this->Html->link('Add antivirus reminder', array('controller' => 'antivirus', 'action' => 'add'), array('class' => 'btn btn-mini btn-primary ')); ?>

<h3> <p class="lead">Open Antivirus</p> </h3>

<?php if(empty($toDoAntivirus)) echo '<i> No antivirus reminder yet.</i>'; ?>

<?php if($toDoAntivirus): ?>

	<div class="table-responsive">

		<table class='table table-striped table-condensed table-hover'>

					
			<thead>
				<tr>
					<?php if ($this->App->current_user_admin()) echo '<th>' . $this->Paginator->sort('User.username', 'Client') . '</th>' ;?>
					<th> <?php echo $this->Paginator->sort('username', 'Av username'); ?> </th>
					<th> <?php echo $this->Paginator->sort('expiry_date'); ?> </th>
					<th> <?php echo $this->Paginator->sort('num_users'); ?></th>
					<th> <?php echo $this->Paginator->sort('renew_cost'); ?> </th>
					<th> <?php echo $this->Paginator->sort('location'); ?> </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($toDoAntivirus as $antivirus): ?>
					<tr class="<?php echo $this->App->shouldBeClosed($antivirus['Antivirus']['av_expiry_date']); ?>">
						<!-- Costumer -->
					<?php if ($this->App->current_user_admin()): ?>
							<td>
								<?php echo $this->Html->link($antivirus['User']['username'], array('controller' => 'users', 'action' => 'view', $antivirus['User']['id'])); ?>
								<?php
									// $date1 = date_create(date("Y-m-d"));
									// $date2 = date_create($antivirus['Antivirus']['av_expiry_date']);
									// $diff  = date_diff($date1, $date2);
									// $days  = $diff->format("%a days");

									// if ($days == 30 and $antivirus['Antivirus']['alert']) echo '30 days';
									// if ($days == 7 and $antivirus['Antivirus']['alert']) echo '7 days';
								?>
							</td>
						<?php endif; ?>

						<!-- Antivirus id -->
						<td>
							<?php echo $antivirus['Antivirus']['username']; ?>
						</td>

						<!-- Expiry date -->
						<td>
							<?php echo date('Y - l jS \of F', strtotime($antivirus['Antivirus']['av_expiry_date'])); ?>
						</td>

						<!-- Num users -->
						<td>
							<?php echo $antivirus['Antivirus']['num_users']; ?>
						</td>

						<!-- Renew cost -->
						<td>
							<?php echo $antivirus['Antivirus']['renew_cost']; ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $antivirus['Antivirus']['location']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php if ($this->App->current_user_admin()) echo $this->Html->link('Close', array('controller' => 'antivirus', 'action' => 'close', $antivirus['Antivirus']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'antivirus', 'action' => 'edit', $antivirus['Antivirus']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $antivirus['Antivirus']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>

		</table>
		<!-- End toDoAntivirus -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>


<h3> <p class="lead">Closed antivirus</p> </h3>

<?php if(empty($closedAntivirus)) echo '<i> No closed antivirus yet.</i>'; ?>

<?php if ($closedAntivirus): ?>

	<div class="table-responsive">


		<table class='table table-striped table-condensed table-hover'>
		
			<thead>
				<tr>
					<?php if ($this->App->current_user_admin()) echo '<th> Customer </th>'; ?>
					<th> Antivirus user </th>
					<th> Expiry date </th>
					<th> Num users </th>
					<th> Renew cost </th>
					<th> Location </th>
					<th class="text-right"> Actions </th>
				</tr>
			</thead>
		
			<tbody>
				<?php foreach($closedAntivirus as $antivirus): ?>
					<tr>
						<!-- Costumer -->
						<?php if ($this->App->current_user_admin()): ?>
							<td>
							<?php echo $this->Html->link($antivirus['User']['username'], array('controller' => 'users', 'action' => 'view', $antivirus['User']['id'])); ?>
							</td>
						<?php endif; ?>

						<!-- Antivirus id -->
						<td>
							<?php echo $antivirus['Antivirus']['username']; ?>
						</td>

						<!-- Expiry date -->
						<td>
							<?php echo date('Y - l jS \of F', strtotime($antivirus['Antivirus']['av_expiry_date'])); ?>
						</td>

						<!-- Num users -->
						<td>
							<?php echo $antivirus['Antivirus']['num_users']; ?>
						</td>

						<!-- Renew cost -->
						<td>
							<?php echo $antivirus['Antivirus']['renew_cost']; ?>
						</td>

						<!-- Location -->
						<td>
							<?php echo $antivirus['Antivirus']['location']; ?>
						</td>

						<!-- Actions -->
						<td class="text-right">
							<?php if ($this->App->current_user_admin()) echo $this->Html->link('Reopen', array('controller' => 'antivirus', 'action' => 'reopen', $antivirus['Antivirus']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Html->link('Edit', array('controller' => 'antivirus', 'action' => 'edit', $antivirus['Antivirus']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $antivirus['Antivirus']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		
		</table>
		<!-- End doneAntivirus -->
	</div>
	<!-- End table-responsive -->
<?php endif; ?>
