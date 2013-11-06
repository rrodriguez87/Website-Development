<?php
	
	class TLogging{
		function __construct(){
			$this->logFile = '../logs/log_'.date('Ymd').'.txt';
		}

		function log( $message ){
			$fp = fopen( $this->logFile, 'a+' );
			$logMessage = date( "Y m d h:i:s", time() )."|".$message."\n";
			$logMessage = str_replace( "/var/www/Website-Development/", '', $logMessage );
			fwrite( $fp, $logMessage );
			fclose( $fp );
		}
	}
