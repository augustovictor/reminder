<h1> Add reminder </h1>

<?php  

	echo $this->Form->create('Reminder');
	echo $this->Form->input('category_id', array('options' => array($categories)));
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('date', array('interval' => '15', 'minYear' => date('Y'), 'maxYear' => date('Y') ));
	echo $this->Form->end('Save');

?>