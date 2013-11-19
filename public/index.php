<?php
	// controller
	require_once( "../classes/classes.Session.php" );
	require_once( "../classes/classes.Database.php" );
    require_once( "../classes/classes.Logging.php" );
	require_once( "../classes/classes.ParseURI.php" );

	$Database	   = new TDatabase();
	$Session       = new TSession();	
	$Logging	   = new TLogging();
	$ParseURI	   = new TParseURI( $_SERVER['REQUEST_URI'] );

	$Logging->log( 'starting script' );
