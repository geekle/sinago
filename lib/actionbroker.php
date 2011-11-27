<?php

	class actionbroker extends action {

		// Implemented from "action"
		private $metric;
		private $context;
		private $event;
		private $resource;

		private $action;
	
		public function __construct($json) {
			switch($json['action']) {
                        	case "downtime":
                                	$this->action = new nagiosdowntime($json);
                                	break;
                        	case "check":
                                	$this->action = new nagioscheck($json);
                                	break;
                        	case "acknowledge":
                                	$this->action = new nagiosacknowledge($json);
                                	break;
	
                	}
        	}

        	public function __destruct() {

        	}

		public function execute() {
			return $this->action->execute();
		}

		public function confirm() {
			return $this->action->confirm();
		}

	}

?>
