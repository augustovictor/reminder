<?php 

	class ReminderHelper extends AppHelper {
		public function shouldBeClosed($reminder_date) {
			if (date("Y-m-d H:i:s") > $reminder_date) {
				return 'danger';
			}
			return '';
		}
		// End shouldBeClosed
	}
	// End ReminderHelper

?>