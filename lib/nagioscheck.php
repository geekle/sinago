<?php

	class nagioscheck extends action {

		// Implemented from "action"
		private $metric;
		private $context;
		private $event;
		private $resource;

		private $command;
	
		public function __construct($json) {
			if ($json["resource"] == "host") {
                        	$this->command = "PROCESS_HOST_CHECK_RESULT;".
                                	$json["hostname"].";".
                                	// 0=UP, 1=DOWN, 2=UNREACHABLE
                                	$json["status_code"].";".
                                	$json["plugin_output"];
                	} elseif ( $json["resource"] == "service" ) {
                        	$this->command = "PROCESS_SERVICE_CHECK_RESULT;".
                                	$json["hostname"].";".
                                	$json["service"].";".
                                	// 0=OK, 1=WARNING, 2=CRITICAL, 3=UNKNOWN
                                	$json["return_code"].";".
                                	$json["plugin_output"];
	
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
