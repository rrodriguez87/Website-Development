<?php
	class TAuthorization{

		function __construct(){
			if( $_SESSION['loggedin'] == 1 )
				$this -> isAuthorized = 1;
			else
				$this -> isAuthorized = 0;
		}
		
		function isAuthorized( $username, $password ){
			return $this -> isAuthorized;
		}
		
		function CheckUserPass(){
			if( $_POST['Username'] == "Roddy" && $_POST['Password'] == "0324" )
				return 1;
			else
				return 0;
		}
	
		function SuccessfulLogin(){
			echo 'You have successfully logged in';
			$_SESSION['loggedin'] = 1;

		}

		function FailedLogin(){
			echo 'Incorrect Username/Password, log in failed!';
			$_SESSION['loggedin'] = 0;
		}

		function DisplayLoginForm(){
			$content = file_get_contents( "../templates/loginform.html" );                                 echo $content;
		}
	}
