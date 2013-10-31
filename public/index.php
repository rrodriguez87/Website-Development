<?php
	// controller
	require_once( "../classes/classes.Authorization.php"  );
	require_once( "../classes/classes.Session.php" );
	$Session       = new TSession();	
	$Authorization = new TAuthorization();
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
	die;
	if( $_SERVER['REQUEST_URI'] != '/' ){
		preg_match('!name/([a-z]+)!imsx', $_SERVER['REQUEST_URI'], $pmatches);
		$content = file_get_contents("../templates/index.html");
		$content = str_replace('{text}', 'Hello, '.$pmatches[1], $content);
		echo $content;
	
	} else {
		echo "you are on the home page";
	}
