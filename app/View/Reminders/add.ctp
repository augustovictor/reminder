<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<h1> Add reminder </h1>

<?php  

	echo $this->Form->create('Reminder', array('role' => 'form'));
	echo $this->Form->input('category_id', array('options' => array($categories)));
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('date', array('id' => 'datepicker', 'type' => 'text', 'interval' => '15', 'minYear' => date('Y'), 'maxYear' => (date('Y') + 5) ));
	echo $this->Form->end('Save', array('class' => 'btn btn-success'));

?>