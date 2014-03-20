<?php  

	App::uses('AppController', 'Controller');

	class NotificationController extends AppController {
		public function notify_client($receiver = null, $name = null) {
			$message = 'Hi, ' . $name . '.';

			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('gmail');
			$email->from('info@kalax.on.ca');
			$email->to('victoraweb@gmail.com');
			$email->subject('Mail testing');
			$email->send($message);

		}
		// End notify_clients
	}
	// End NotificationController

?>