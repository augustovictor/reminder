<h1> New category </h1>

<?php  

	echo $this->Form->create('Category');
	echo $this->Form->input('title');
	echo $this->Form->input('description', array('rows' => '5'));
	echo $this->Form->end('Save');

?>