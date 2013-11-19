<?php
	require_once( "../classes/classes.Authorization.php" );

	class TParseURI{
		function __construct( $uri ){
			$this->Authorization = new TAuthorization();
//			$this->doAuthorization();
			if(	preg_match( '|^/([^/]+)|imsx', $uri, $pmatches ) ){
				$className = $pmatches[1];
			} else {
				$className = 'homepage';
			}

			if( strlen( $className ) > 32 )
				die();
			$className = preg_replace( '|[^a-z0-9]|imsx', '', $className );
			
			if( file_exists( "../classes/pages/classes.".$className.".php" ) ){
				require_once( "../classes/pages/classes.".$className.".php");
				$pageClass = new TPageClass( $className );			
			} else {
				die( "Page not found." );
			}
		}

		function doAuthorization(){
			$ControllerVars['loggedin'] = 0;
			if( $this->Authorization->isAuthorized() ){
				$ControllerVars['loggedin'] = 1;
			} else {
				if( $_POST['submit'] == 'Submit' ){
					if( $this->Authorization->CheckUserPass() ) {
						$ControllerVars['loggedin'] = 1;
						$this->Authorization->SuccessfulLogin();
					} else {
						$this->Authorization->FailedLogin();
					}
				}
			}
		}
	}




