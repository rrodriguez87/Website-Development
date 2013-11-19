<?php
	require_once( "../classes/classes.Logging.php" );
	class TAuthorization{
		function __construct(){
			$this->logging = new TLogging();
			if( $_SESSION['loggedin'] == 1 )
				$this -> isAuthorized = 1;
			else
				$this -> isAuthorized = 0;
		}
		
		function isAuthorized( $username, $password ){
			$this->logging->log("User: ".$username." Pass: ".$password );
			return $this->isAuthorized;
		}
		
		function CheckUserPass(){
			if( $_POST['username'] == "Roddy" && $_POST['password'] == "0324" ){
				return 1;
			}else{
				return 0;
			}
		}
	
		function SuccessfulLogin(){
			echo 'You have successfully logged in';
			$_SESSION['loggedin'] = 1;

		}

		function FailedLogin(){
			echo 'Incorrect Username/Password, log in failed!';
			$_SESSION['loggedin'] = 0;
		}

		function CreateUser( $username, $password ){
			$sqlQuery = "Insert into users (username, password) values ( '".$username."', '".$password."' )";
			$this->Logging->log( $sqlQuery );

		}

		function DisplayLoginForm(){
			$content = file_get_contents( "../templates/loginform.html" );
			if( $content )
				echo $content;
			else
				echo 'couldnt find loginform';
		}

		function DisplayRegForm(){
			$content = file_get_contents( "../templates/registerform.html" );
			if( $content )
				echo $content;
			else
				echo 'couldnt retrieve page';
		}
		function DisplayMemberPage(){
			$content = file_get_contents( "../templates/MemberPage.html" );
			if( $content )
				echo $content;
			else
				echo 'couldnt retrieve Member page';
		}


	}

