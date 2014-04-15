<?php 

	class ReminderTask extends AppShell {
	    public $tasks = array('Antivirus');

	    public function remindClients() {
	    	$antivirus = $this->Antivirus->find('all');

	    	foreach($antivirus as $av) {
	    		if (!$av['Antivirus']['done']) {
	    			$this->out($av['Antivirus']['id'], 1, Shell::VERBOSE);
	    			$this->stdout->styles('flashy', array('text' => $av['Antivirus']['id'], 'blink' => true));
	    		}
	    	}
	    	// End foreach

	    }
	    // End show
	}

 ?>