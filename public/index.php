<?php
	// controller
	require_once( "../classes/classes.Authorization.php"  );
	require_once( "../classes/classes.Session.php" );
	require_once( "../classes/classes.Database.php" );
    require_once( "../classes/classes.Logging.php" );
	
	$Database	   = new TDatabase();
	$Session       = new TSession();	
	$Authorization = new TAuthorization();
	$Logging	   = new TLogging();
	
	$Logging->log( 'starting script' );

	$ControllerVars['loggedin'] = 0;

	if( $Authorization -> isAuthorized() )
		$ControllerVars['loggedin'] = 1;
	else{
		if($_POST['submit'] == 'submit'){
			//they submitted the loginform
			if( $Authorization -> CheckUserPass() ){
				$ControllerVars['loggedin'] = 1;
				$Authorization -> SuccessfulLogin();
			} else {
				$Authorization ->FailedLogin();
			}
		}
	}	

	if( $ControllerVars['loggedin'] == 0 )
		$Authorization -> DisplayLoginForm();

