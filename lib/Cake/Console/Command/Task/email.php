<?php  

	App:import('Core', 'Controller');
	App:import('Component', 'Email');

	class EmailTask extends Shell {
		// Controller class
		var $Controller;

		// Email component
		var $Email

		// List of default variables for EmailComponent
		var $defaults = array(
				'to'        => null, 
		        'subject'   => null, 
		        'charset'   => 'UTF-8', 
		        'from'      => null, 
		        'sendAs'    => 'html', 
		        'template'  => null, 
		        'debug'     => false, 
		        'additionalParams'    => '', 
		        'layout'    => 'default' 
			);

		// Startup for EmailTask
		function initialize() {
			$this->Controller =& new Controller();
			$this->Email =& new EmailComponent(null);
			$this->Email->startup($this->Controller);
		}
		// End initialize

		// Sned email using EmailComponent
		function send($settings = array()) {
			$this->settings($settings);
			return $this->Email->send();
		}
		// End send

		// Used to set view to the Controller so that they will be available when view render the template
		function set($name, $data) {
			$this->Controller->set($name, $data);
		}
		// End set

		// Change default variables. Fancy if you want to send many emails and only want to change 'from' or few keys
		function settings($settings = array()) { 
	        $this->Email->_set($this->defaults = array_filter(am($this->defaults, $settings))); 
	    }
	    // End settings
	}
	// End EmailTask

?>