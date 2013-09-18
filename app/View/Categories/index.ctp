<h1> Categories </h1>

<?php echo $this->Html->link('Add category', array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>


<?php if (empty($categories)): ?>

	<i> No categories yet. </i>

<?php endif; ?>

<?php if(!empty($categories)): ?>
	<div class="table-responsive">
		<table class='table table-striped table-condensed table-hover'>

			<thead>
				<tr>
					<th> <strong>Category</strong> </th>
					<th class="text-right"> <strong>Actions</strong> </th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($categories as $category): ?>
					<tr>
						<td> 
							<?php echo $this->Html->link($category['Category']['title'], array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])); ?> 
						</td>

						<td class="text-right"> 
							<?php echo $this->Html->link('Edit', array('controller' => 'categories', 'action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-success btn-xs')); ?>
							<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-danger btn-xs'), array('confirm' => 'Are you sure?')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	<!-- End table-responsive -->

<?php endif; ?>