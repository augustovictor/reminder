<h1> <?php echo ucfirst(h($user['User']['username'])); ?></h1>
<span>Email: </span>
<?php echo h($user['User']['email']); ?>

<hr> <hr />

<div class="table-responsive">

	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#Antivirus">Antivirus <span class="badge"><?php echo count($antivirus); ?> </span> </a></li>
	  <li><a href="#Battery">Battery <span class="badge"><?php echo count($batteries); ?> </span> </a></li>
	  <li><a href="#Pm">Pm <span class="badge"><?php echo count($pms); ?> </span> </a></li>
	</ul>

	<div class="tab-content">
	  <div class="tab-pane active" id="Antivirus">
		<p class="lead"> Antivirus </p>
		<table class='table table-striped table-condensed table-hover'>

			<thead>
					<tr>
						<th> Antivirus user </th>
						<th> Expiry date </th>
						<th> Num users </th>
						<th> Renew cost </th>
						<th> Location </th>
						<th class="text-right"> Actions </th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($antivirus as $antivirus): ?>
						<tr class="<?php echo $this->App->shouldBeClosed($antivirus['Antivirus']['av_expiry_date']); ?>">
							<!-- Antivirus id -->
							<td>
								<?php echo $antivirus['Antivirus']['username']; ?>
							</td>

							<!-- Expiry date -->
							<td>
								<?php echo date('l jS \of F', strtotime($antivirus['Antivirus']['av_expiry_date'])); ?>
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

	  </div>
	  
	  <div class="tab-pane" id="Battery">
		<p class="lead"> Battery </p>
		<table class='table table-striped table-condensed table-hover'>

			<thead>
					<tr>
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
	  
	  <div class="tab-pane" id="Pm">
		<p class="lead"> Pm </p>
		<table class='table table-striped table-condensed table-hover'>

			<thead>
					<tr>
						<th> Date </th>
						<th> Location </th>
						<th class="text-right"> Actions </th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($pms as $pm): ?>
						<tr class="<?php echo $this->App->shouldBeClosed($pm['Pm']['date']); ?>">
							<!-- Expiry date -->
							<td>
								<?php echo date('l jS \of F', strtotime($pm['Pm']['date'])); ?>
							</td>

							<!-- Location -->
							<td>
								<?php echo $pm['Pm']['location']; ?>
							</td>

							<!-- Actions -->
							<td class="text-right">
								<?php if ($this->App->current_user_admin()) echo $this->Html->link('Close', array('controller' => 'pm', 'action' => 'close', $pm['Pm']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
								<?php echo $this->Html->link('Edit', array('controller' => 'pm', 'action' => 'edit', $pm['Pm']['id']), array('class' => 'btn btn-success btn-xs')); ?>
								<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $pm['Pm']['id']), array('confirm' => 'Are you sure?', 'class' => 'btn btn-danger btn-xs')); ?>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
		</table>
	  </div>
	</div>

</div>
<!-- End table-responsive -->

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

  $(function () {
    $('#myTab a:first').tab('show')
  })
</script>