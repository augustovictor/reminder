<h1> User: <?php echo h($user['User']['username']); ?></h1>

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
				<?php foreach($batteries as $battery): ?>
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
</div>
<!-- End table-responsive -->