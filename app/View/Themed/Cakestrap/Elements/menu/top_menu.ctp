<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('Reminder system', array('controller' => 'users', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse">
		<!-- If user logged in -->
		<?php if($this->Session->read('Auth.User')): ?>
			<ul class="nav navbar-nav">

					<li class="active"> <?php echo $this->Html->link('Antivirus', array('controller' => 'antivirus', 'action' => 'index')); ?></li>

					<li><?php echo $this->Html->link('Batteries', array('controller' => 'batteries', 'action' => 'index')); ?></li>

					<li><?php echo $this->Html->link('Pms', array('controller' => 'pms', 'action' => 'index')); ?></li>

					<?php if ($this->App->current_user_admin()): ?>
						<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
					<?php endif; ?>

					<li>
					</li>

					

					<?php if(!$this->Session->read('Auth.User')): ?>
					<!-- If user NOT logged in -->
						<li> <?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?> </li>
						<!-- <li> <?php #echo $this->Html->link('Sign up', array('controller' => 'users', 'action' => 'add')); ?> </li> -->
					<?php endif; ?> 
				</li>
			</ul><!-- /.nav navbar-nav -->

			<ul class="nav navbar-nav navbar-right">
				<li class="">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
					<?php echo AuthComponent::user('role'); ?>
					-
					<?php echo AuthComponent::user('username'); ?> 
				</a>
				</li>
				<li>
					<?php echo $this->Html->link(' Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => '')); ?>
				</li>
			</ul><!-- /.nav navbar-nav navbar-right -->
		<?php endif; ?>
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->