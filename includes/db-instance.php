<?php


function create_plugin_database_table_testTakers()

{

	global $table_prefix, $wpdb;



	$tblname = 'testTakers';

	$wp_track_table = $table_prefix . "$tblname";



	if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table) 

	{



		$sql = "CREATE TABLE `". $wp_track_table . "` ( ";

		$sql .= "  `id`  int(11)   NOT NULL auto_increment, ";

		$sql .= "  `nameSurname`  varchar(128) NOT NULL, ";

		$sql .= "  `testDate`  varchar(200) NOT NULL, ";

		$sql .= "  `answersWithQuestions`  varchar(200000) NOT NULL, ";

		$sql .= "  PRIMARY KEY `order_id` (`id`) "; 

		$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		dbDelta($sql);

	}

}
function create_plugin_database_table_testQuestions()

{

	global $table_prefix, $wpdb;



	$tblname = 'testQuestions';

	$wp_track_table = $table_prefix . "$tblname";



	if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table) 

	{



		$sql = "CREATE TABLE `". $wp_track_table . "` ( ";

		$sql .= "  `id`  int(11)   NOT NULL auto_increment, ";

		$sql .= "  `questions`  varchar(200000) NOT NULL, ";

		$sql .= "  `rightAnswers`  varchar(200000) NOT NULL, ";

		$sql .= "  `wrongAnswers`  varchar(200000) NOT NULL, ";

		$sql .= "  `questionType`  varchar(200000) NOT NULL, ";

		$sql .= "  PRIMARY KEY `order_id` (`id`) "; 

		$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		dbDelta($sql);

	}

}

	global $wpdb;

	$table_name = $wpdb->base_prefix.'testQuestions';

	$query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );


	if ( ! $wpdb->get_var( $query ) == $table_name ) {
		create_plugin_database_table_testQuestions();
		create_plugin_database_table_testTakers();
	}


