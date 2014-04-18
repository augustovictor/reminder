<h1> Users </h1>

<?php if ($this->App->current_user_admin()) echo $this->Html->link(__('Add user'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>

<br>
<br>

<div class="table-responsive">

	<table class='table table-striped table-condensed table-hover'>

		<thead>
			<tr>
				<th> <?php echo $this->Paginator->sort('username', 'Client'); ?> </th>
				<th> <?php echo $this->Paginator->sort('company'); ?> </th>
				<th> <?php echo $this->Paginator->sort('email'); ?> </th>
				<?php if ($this->App->current_user_admin()): ?>
					<th> <strong> Actions </strong> </th>
				<?php endif; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach($users as $user): ?>
				<tr>
					<!-- User -->
					<td> 
						<?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?> 
					</td>

					<!-- Company -->
					<td> <?php echo $user['User']['company']; ?> </td>

					<!-- Email -->
					<td> <?php echo $user['User']['email']; ?> </td>

					<!-- Actions -->
					<?php if ($this->App->current_user_admin()): ?>
						<td class="text-right">
							<?php echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
</div>
<!-- End table-responsive -->