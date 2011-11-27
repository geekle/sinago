<?php

	class nagiosdowntime extends action {

		// Implemented from "action"
		private $metric;
		private $context;
		private $event;
		private $resource;

		private $command;
	
		public function __construct($json) {

			if ($json["resource"] == "host") {
                        $this->command = "SCHEDULE_HOST_DOWNTIME;".
                                $json["hostname"].";".
                                $json["start_time"].";".
                                $json["end_time"].";".
                                $json["fixed"].";".
                                $json["trigger_id"].";".
                                $json["duration"].";".
                                $json["author"].";".
                                $json["comment"];
                	} elseif ( $json["resource"] == "service" ) {
                        	// TODO: Add 'SCHEDULE_HOST_SVC_DOWNTIME'
                        	$this->command = "SCHEDULE_SVC_DOWNTIME;".
                                	$json["hostname"].";".
                                	$json["service"].";".
                                	$json["start_time"].";".
                                	$json["end_time"].";".
                                	$json["fixed"].";".
                                	$json["trigger_id"].";".
                                	$json["duration"].";".
                                	$json["author"].";".
                                	$json["comment"];
                	} else {
				//ERROR!
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
