<?php 

	App::uses('CakeEmail', 'Network/Email');

	class NotifyClientsShell extends AppShell {
		// date_default_timezone_set('Canada/Central');
		public $uses = array('Battery');

		public function notify() {
			// All Batteries
			$batteries = $this->Battery->find('all', array('conditions' => array('notified' => 1))); //CHANGE TO 0

			$this->out('Batteries');
			foreach($batteries as $battery) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($battery['Battery']['expiry_date']))/3600/24) <= 14) {
					$Email = new CakeEmail();
					$Email->$Email->template('battery_reminder', 'default')
						->viewVars(array('username' => $battery['User']['username'], 'date' => $battery['Battery']['expiry_date']))
						->emailFormat('html')
						->from(array('info@kalax.on.ca' => 'Kalax Reminder'))
					    ->to($battery['User']['email'])
					    ->subject('Battery')
					    ->send('Reminder to ' . $battery['User']['username']);
						$this->out($battery['User']['email'] . ' - ' . $battery['User']['username']);
						$this->Battery->id = $battery['Battery']['id'];
						$this->Battery->set('notified', 0); // CHANGE TO 1
						$this->Battery->save();
						
				}
				// End email sending
			}
			// End foreach Batteries

		}
	}
	// End NotifyClientsShell

?>