<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('Reminder system', array('controller' => 'reminders', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<?php if($this->Session->read('Auth.User')): ?>
				<li class="active"><?php echo $this->Html->link('Reminders', array('controller' => 'reminders', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>

				<!-- If user logged in -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
						<?php echo AuthComponent::user('username'); ?> 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'glyphicon glyphicon-off')); ?>
						</li>

					</ul>
					<!-- End dropdown -->
				<?php endif; ?>

				<?php if(!$this->Session->read('Auth.User')): ?>
				<!-- If user NOT logged in -->
					<li> <?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?> </li>
					<li> <?php echo $this->Html->link('Sign up', array('controller' => 'users', 'action' => 'add')); ?> </li>
				<?php endif; ?> 
			</li>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->