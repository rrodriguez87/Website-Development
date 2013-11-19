<?php
	
	require_once( "../classes/classes.GeneralPage.php" );
	require_once( "../classes/classes.Database.php" );

	class TPageClass extends TGeneralPage {
		function init(){
			$this->database = new TDatabase();
			$this->CreateContent();
			$this->DisplayContent();
		}

		function handleFormSubmission(){
			$sqlQuery = "select count(*) as count from users where username = '".$this->safePost['username']."' and password = '".$this->safePost['password']."'";
	//		echo reset($this->database->SingleRowQuery( $sqlQuery ) );
			
			if( reset( $this->database->SingleRowQuery( $sqlQuery ) ) ){
				echo 'you have successfully logged in';
			} else {
				echo 'Username/Password not found';
			}
		}
	}
