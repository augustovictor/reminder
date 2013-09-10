<h1> Reminders </h1>

<?php echo $this->Html->link('Add reminder', array('controller' => 'reminders', 'action' => 'add')); ?>

<table>

	<thead>
		<tr>
			<td></td>
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
			</tr>
		<?php endforeach;?>
	</tbody>

</table>