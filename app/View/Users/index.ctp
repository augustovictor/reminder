<h1> Users </h1>

<table>

	<thead>
		<tr>
			<th> <strong> User </strong> </th>
			<th> <strong> Password </strong> </th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($users as $user): ?>
			<tr>
				<td> <?php echo $user['User']['username']; ?> </td>
				<td> <?php echo $user['User']['password']; ?> </td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>