<?php
	require_once( "../classes/classes.GeneralPage.php" );
	require_once( "../classes/classes.Database.php" );

	class TPageClass extends TGeneralPage {
		function init(){
			$this->Database = new TDatabase();
			if(!isset($_POST['submit'])){
				$this->DisplayContent();					
			}				
		}

		function handleFormSubmission(){
//			$sqlQuery = "insert into users ( username, password ) values ( '".$this->safePost['username']."', '".$this->safePost['password']."' );";
			echo 'this is a form handler';
				

		}

	}
