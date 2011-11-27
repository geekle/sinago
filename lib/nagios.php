<?php

	class nagios extends sinago {

		private $commandfile, $statusfile;

		public function __construct($commandfile, $statusfile) {
                	$this->commandfile = $commandfile;
        	}

        	public function __destruct() {

        	}
		public function execute(actionbroker $action) {
		
			$file = fopen($this->commandfile, 'a');
                	fwrite($file, "[".time()."] ".$action->execute()."\n");
                	fclose($file);
	
			// Confirm change was successful.
			return $action->confirm();

		}

	}

?>
