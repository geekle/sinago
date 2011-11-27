<?php
	class sinago {
	
		private $command;
		private $nagios;
	
		public function __construct(nagios $nagios) {
			$this->nagios = $nagios;
		}
	
		public function __destruct() {
	
		}	
	
		public function execute(actionbroker $action) {
		
			return $this->nagios->execute($action);
	
		}
	}


?>
