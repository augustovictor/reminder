<?php 

	App::uses('CakeEmail', 'Network/Email');

	class NotifyClientsShell extends AppShell {
		// date_default_timezone_set('Canada/Central');
		public $uses = array('Antivirus', 'Battery', 'Pm');

		public function notify() {
			// All Antivirus
			$avs = $this->Antivirus->find('all', array('conditions' => array('notified' => 1))); //CHANGE TO 0
			// All Batteries
			$batteries = $this->Battery->find('all', array('conditions' => array('notified' => 1))); //CHANGE TO 0
			// All Pms
			$pms = $this->Pm->find('all', array('conditions' => array('notified' => 1))); //CHANGE TO 0
			


			$this->out('Antivirus');
			foreach($avs as $av) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($av['Antivirus']['av_expiry_date']))/3600/24) <= 14) {
					$Email = new CakeEmail();
					$Email->template('antivirus_reminder', 'default')
						->viewVars(array('username' => $av['User']['username'], 'date' => $av['Antivirus']['av_expiry_date']))
						->emailFormat('html')
					    ->to($av['User']['email'])
						->from(array('info@kalax.on.ca' => 'Kalax Reminder'))
					    ->subject('Antivirus')
					    ->send('Reminder to ' . $av['User']['username']);
						$this->out($av['User']['email'] . ' - ' . $av['User']['username']);
						$this->Antivirus->id = $av['Antivirus']['id'];
						$this->Antivirus->set('notified', 0); // CHANGE TO 1
						$this->Antivirus->save();
						
				}
				// End email sending
			}
			// End foreach antivirus

			$this->out('Batteries');
			foreach($batteries as $battery) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($battery['Battery']['expiry_date']))/3600/24) <= 14) {
					$Email = new CakeEmail();
					$Email->template('battery_reminder', 'default')
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

			$this->out('Pms');
			foreach($pms as $pm) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($pm['Pm']['date']))/3600/24) <= 5) {
					$Email = new CakeEmail();
					$Email->template('pm_reminder', 'default')
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