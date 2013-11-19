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
	
		}
	}
