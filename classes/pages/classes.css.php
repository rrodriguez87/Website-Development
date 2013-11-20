<?php
	require_once( "../classes/classes.GeneralPage.php" );
	require_once( "../classes/classes.Database.php" );

	class TPageClass extends TGeneralPage {
		function init(){
			header( "Content-Style-Type: text/css" );
			header( "Content-Type: text/css " );
			if( preg_match( '|^/css/(.*?)$|imsx', $_SERVER['REQUEST_URI'], $pmatches ) ){
				$filename = "../templates/css/".$pmatches[1];
				if( file_exists( $filename ) ){
					$file = file_get_contents( $filename );
					echo $file;
				}
			}
		}

	}	
