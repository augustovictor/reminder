<h1> Users </h1>

<div class="table-responsive">

	<table class='table table-striped table-condensed table-hover'>

		<thead>
			<tr>
				<th> <strong> Username </strong> </th>
				<th> <strong> Password </strong> </th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($users as $user): ?>
				<tr>
					<td> <?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?> </td>
					<td> <?php echo $user['User']['password']; ?> </td>
				</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
</div>
<!-- End table-responsive -->