<h1> Edit reminder: </h1>

<?php  

	echo $this->Form->create('Reminder');
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('date');

	echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->end('Update');

?>