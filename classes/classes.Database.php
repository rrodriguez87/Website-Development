<?php
	require_once( "../classes/classes.Logging.php" );
	
	class TDatabase{
		function __construct(){
			$this->logging = new TLogging();
			if( $this->database = mysqli_connect( "localhost", "root", "Peavey3914", "users"))
				$this->logging->log( __FILE__."||".'Connected to MySQL database.'  );
			else 
				$this->logging->log( 'Failed connection attempt to MySQL database. ' );
		}

		function MultiRowQuery( $sqlQuery ){
			$result = $this->database->query( $sqlQuery );
			$rows = array();
			while( $rows = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
				$returnArray[] = $rows;	
			return $returnArray;

		}

		function SingleRowQuery( $sqlQuery ){
			$result = $this->database->query( $sqlQuery );
			$row = array();
			while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) 
				return $row;
			//should never get to this point
			return 0;
		}
	}	
