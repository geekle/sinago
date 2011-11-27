<?php
	/**
	Sinago
	*/

	$ROOT = ".";
	
	// Include the configuration.
	include_once($ROOT."/config.php");

	// Grab the JSON...	
	$json = json_decode(file_get_contents('php://input'),1);

	// Is the JSON empty?
	if (!empty($json)){

		// Set up Nagios.
		$nagios = new nagios($commandfile, $statusfile);

		// Send the JSON to the action broker	
		$action = new actionbroker($json);
	
		// Set up Sinago, pass it Nagios.
		$sinago = new sinago($nagios);

		// Execute the action and provide any output.
		print $sinago->execute($action);

	} else {

		print "ERROR: No data provided.";

	}
	
?>
