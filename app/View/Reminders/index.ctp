<h1> Reminders </h1>

<?php echo $this->Html->link('Add reminder', array('controller' => 'reminders', 'action' => 'add')); ?>

<table>

	<thead>
		<tr>
			<td> Reminder </td>
			<td> Date </td>
			<td> Actions </td>
		</tr>
	</thead>

	<tbody>
		<?php if(!$reminders) echo '<i> No reminders yet.</i>'; ?>
		<?php if($reminders) ?>
		<?php foreach($reminders as $reminder): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($reminder['Reminder']['title'], array('controller' => 'reminders', 'action' => 'view', $reminder['Reminder']['id'])); ?>
				</td>

				<td>
					<?php echo date('l jS \of F Y h:i:s A', strtotime($reminder['Reminder']['date'])); ?>
				</td>

				<td>
					<?php echo $this->Html->link('Edit', array('controller' => 'reminders', 'action' => 'edit', $reminder['Reminder']['id'])); ?>
					<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => 'Are you sure?')); ?>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>

</table>