<?php

	class nagiosacknowledge extends action {

		// Implemented from "action"
		private $metric;
		private $context;
		private $event;
		private $resource;

		private $command;
	
		public function __construct($json) {
			if ($json["resource"] == "host") {
                        	$this->command = "ACKNOWLEDGE_HOST_PROBLEM;".
                                	$json["hostname"].";".
                                	$json["sticky"].";".
                                	$json["notify"].";".
                                	$json["persistant"].";".
                                	$json["author"].";".
                                	$json["comment"];
                	} elseif ( $json["resource"] == "service" ) {
                        	$this->command = "ACKNOWLEDGE_SVC_PROBLEM;".
                                	$json["hostname"].";".
                                	$json["service"].";".
                                	$json["sticky"].";".
                                	$json["notify"].";".
                                	$json["persistant"].";".
                                	$json["author"].";".
                                	$json["comment"];
                	} else {
                        	// ERROR!
                	}

		}

        	public function __destruct() {

        	}

		public function execute() {

			return $this->command;

		}
		public function confirm() {
			return "Confirmed.";
		}

	}

?>
