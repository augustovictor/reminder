<?php  

	class NotificationShell extends Shell {
		
		// Tasks for this shell
		var $tasks = array('Email');

		// Email task
		var $Email;

		// Startup method for the shell
		// Set default params for the EmailTask
		function startup() {
			$this->Email->settings(array(
					'from' => 'info@kalax.on.ca',
					'template' => 'test'
				));
		}
		// End startup

		// Send one email only
		function sendMeAnEmail() {
			return $this->Email->send(array(
					'to' => 'victoraweb@gmail.com',
					'subject' => 'Talking to myself.'
				));
		}
		// End sendMeAnEmail

	}
	// End NotificationShell

?>