<?php

	/**
	Sinago Configuration
	*/

	// $ROOT is set to application root.

	function __autoload($class) {
		global $ROOT;
    		include ($ROOT."/lib/" . $class . '.php');
	}

	// Logging
        error_reporting(E_ALL);
	if (isset($_GET['debug'])){
		ini_set('display_errors', 1);
	}
	ini_set('log_errors', 1);
        ini_set('error_log', $ROOT . '/log/errors.log');
	
	// Nagios External Command File - Sinago writes the commands to this file
	// e.g. /var/lib/nagios3/rw/nagios.cmd
	$commandfile = $ROOT."/command.log";

	// Nagios Status File - Sinago reads status information from this file
	// e.g. /var/cache/nagios3/status.dat
	$statusfile = $ROOT."/status.dat";

?>
