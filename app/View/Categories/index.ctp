<h1> Categories </h1>

<?php echo $this->Html->link('Add category', array('controller' => 'categories', 'action' => 'add')); ?>


<?php if (empty($categories)): ?>

	<i> No categories yet. </i>

<?php endif; ?>

<?php if(!empty($categories)): ?>

	<table>

		<thead>
			<tr>
				<th> <strong>Category</strong> </th>
				<th> <strong>Actions</strong> </th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($categories as $category): ?>
				<tr>
					<td> 
						<?php echo $this->Html->link($category['Category']['title'], array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])); ?> 
					</td>

					<td> 
						<?php echo $this->Html->link('Edit', array('controller' => 'categories', 'action' => 'edit', $category['Category']['id'])); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $category['Category']['id']), array('confirm' => 'Are you sure?')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>

	</table>

<?php endif; ?>