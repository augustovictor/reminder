<?php
	class OutputShell extends AppShell {
	    public $uses = array('Antivirus');

	    public function notify() {
			$avs = $this->Antivirus->find('all', array('conditions' => array('notified' => 1)));
			foreach($avs as $av) {
				if(abs(floor(strtotime(date('Y/m/d')) - strtotime($av['Antivirus']['av_expiry_date']))/3600/24) == 14) {
					// $Email = new CakeEmail();
					// $Email->from(array('info@kalax.on.ca' => 'Kalax reminder'))
					//     ->to($av['User']['email'])
					//     ->subject('Reminder')
					//     ->send('Reminder to ' . $av['User']['username']);
						$this->out($av['User']['email'] . ' - ' . $av['User']['username']);
						$this->Antivirus->save($av['Antivirus']['notified'], 0);
						
				}
				// End email sending
			}
		}
	}
	// End OutputShell
?>