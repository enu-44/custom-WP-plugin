<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.kroonwebdesign.nl/
 * @since             1.0.0
 * @package           Spanish_Test
 *
 * @wordpress-plugin
 * Plugin Name:       Spanish test
 * Plugin URI:        -
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Kroon Webdesign
 * Author URI:        https://www.kroonwebdesign.nl/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       spanish-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SPANISH_TEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-spanish-test-activator.php
 */
function activate_spanish_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spanish-test-activator.php';
	Spanish_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-spanish-test-deactivator.php
 */
function deactivate_spanish_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-spanish-test-deactivator.php';
	Spanish_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_spanish_test' );
register_deactivation_hook( __FILE__, 'deactivate_spanish_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-spanish-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_spanish_test() {

	$plugin = new Spanish_Test();
	$plugin->run();

}
run_spanish_test();

//Initialize DB tables if they're not already
require plugin_dir_path( __FILE__ ) . 'includes/db-instance.php';


//Admin pages answer list
add_action('admin_menu', 'plugin_setup_menu_answerList');

function plugin_setup_menu_answerList(){
	add_menu_page( 'Skilltest Answer List', 'Spanish Skilltest', 'manage_options', 'spanish-test', 'initAnswerList' );
	     // This is the hidden page
	add_submenu_page(
		null, 
		'Skilltest Answer',
		'Skilltest Answer', 
		'manage_options', 
		'viewtestans', 
		'initSAcallback'
	);
}

function initAnswerList(){
	include('admin/render-list.php');
	//	include('class-list.php');
//				include('list.php');

	//include('includes/addProduct.php');
}


//viewtestans
//Admin test creation page #E46924 #F8C126
/*add_action('admin_menu', 'plugin_setup_menu_testCreation');

function plugin_setup_menu_testCreation(){
	add_submenu_page( 'spanish-test', 'Skilltest Questions', 'Skilltest Questions', 'manage_options', 'spanish-teast' , 'initTestCreation' );
}

function initTestCreation(){
	include('admin/add-questions.php');
	//include('includes/addProduct.php');
}
*/
function resultsPageSc( $atts = array() ) {

    // set up default parameters
	shortcode_atts(array(
		'deel' => '1',
		'r' => '0'
	), $atts);

	require('includes/test-view.php');
	return;
}
add_shortcode('test-resultaten', 'resultsPageSc');

add_action( 'wp_ajax_nopriv_spanishanswers', 'spanishanswers_callback' );
add_action( 'wp_ajax_spanishanswers', 'spanishanswers_callback' );

function spanishanswers_callback() {
	global $table_prefix, $wpdb;

	$tblname = 'spanish_answers';

	$wp_track_table = $table_prefix . "$tblname";

	if ($wpdb->get_var("show tables like '$wp_track_table'") != $wp_track_table)

	{

		$sql = "CREATE TABLE `" . $wp_track_table . "` ( ";

		$sql .= "  `id`  int(11)   NOT NULL auto_increment, ";

		$sql .= "  `questions`  varchar(1280000) NOT NULL, ";
				$sql .= "  `answers`  varchar(1280000) NOT NULL, ";


		$sql .= "  `name`  varchar(1280000) NOT NULL, ";

		$sql .= "  `email`  varchar(1280000) NOT NULL, ";

		$sql .= "  `date`  varchar(1280000) NOT NULL, ";

		$sql .= "  PRIMARY KEY `order_id` (`id`) ";

		$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

		require_once (ABSPATH . '/wp-admin/includes/upgrade.php');

		dbDelta($sql);

	}


	$questions = json_decode(stripslashes($_POST['answers']))->answers[0][0];
	$answers = json_decode(stripslashes($_POST['answers']))->answers[0][1];
	$questionCount = count($answers);
	$email = $answers[$questionCount-1];
	$name = $answers[$questionCount-2]; 
	$date = time();
var_dump($name);
var_dump($date);
var_dump($email);
var_dump($questionCount);
var_dump($answers);
	$wpdb->insert($wp_track_table, array(

		'questions' => serialize($questions),
		'answers' =>serialize( $answers),
		'name' => $name,		
		'email' => $email,		
		'date' => $date		


	)) ;
	//var_dump(serialize( $answers));
	wp_die(); 
}


function initSAcallback() {
	include('admin/viewtestans.php');
}