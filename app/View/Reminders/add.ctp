<h1> Add reminder </h1>

<?php  

	echo $this->Form->create('Reminder');
	// echo $this->Form->input('category_id', array('options' => $categories, 'empty' => 'Choose a category'));
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('date');
	echo $this->Form->end('Save');

?>