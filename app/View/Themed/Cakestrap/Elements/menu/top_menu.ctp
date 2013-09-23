<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('Reminder system', array('controller' => 'antivirus', 'action' => 'index'), array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav offset-3">
			<?php if($this->Session->read('Auth.User')): ?>

				<li><?php echo $this->Html->link('Antivirus', array('controller' => 'antivirus', 'action' => 'index')); ?></li>

				<li class="active"><?php echo $this->Html->link('Batteries', array('controller' => 'batteries', 'action' => 'index')); ?></li>

				<!-- If user logged in -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
						<?php echo AuthComponent::user('role'); ?>
						-
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