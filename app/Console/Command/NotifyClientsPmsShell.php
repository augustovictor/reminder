<?php 

	App::uses('CakeEmail', 'Network/Email');

	class NotifyClientsShell extends AppShell {
		// date_default_timezone_set('Canada/Central');
		public $uses = array('Pm');

		public function notify() {
			// All Pms
			$pms = $this->Pm->find('all', array('conditions' => array('notified' => 1))); //CHANGE TO 0

			$this->out('Pms');
			foreach($pms as $pm) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($pm['Pm']['date']))/3600/24) <= 5) {
					$Email = new CakeEmail();
					$Email->$Email->template('pm_reminder', 'default')
						->viewVars(array('username' => $pm['User']['username'], 'date' => $pm['Pm']['date']))
						->emailFormat('html')
						->from(array('info@kalax.on.ca' => 'Kalax Reminder'))
					    ->to($pm['User']['email'])
					    ->subject('Preventative Maintenance')
					    ->send('Reminder to ' . $pm['User']['username']);
						$this->out($pm['User']['email'] . ' - ' . $pm['User']['username']);
						$this->Pm->id = $pm['Pm']['id'];
						$this->Pm->set('notified', 0); // CHANGE TO 1
						$this->Pm->save();
						
				}
				// End email sending
			}
			// End foreach Pms
		}
	}
	// End NotifyClientsShell

?>