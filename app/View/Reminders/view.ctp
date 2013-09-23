<h3> Reminder:  <p class="lead"><?php echo h($reminder['Reminder']['title']); ?></p> </h3>

<p class="lead">Category: <?php echo h($reminder['Category']['title']); ?></p>

<p class="lead">Description: <?php echo h($reminder['Reminder']['description']); ?></p>

<p class="lead">Date: <?php echo date('l, jS \of F Y h:i:s A', strtotime(h($reminder['Reminder']['date']))); ?></p>

