<?php
/**
* Plugin Name: Elementor - Add On Memory Limit Error Patch
* Plugin URI: https://github.com/FreshyMichael/elementor-plus-addons-error-corrections
* Description: Patches The Plus Addons for Elementor Page Builder | Disables pagebuilder loading state
* Version: 1.0.0
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* The Plus Addons for Elementor - Error Patch || Start */
//______________________________________________________________________________
add_action('admin_enqueue_scripts','fs_plus_addon_patch');
add_action('wp_enqueue_scripts','fs_plus_addon_patch');
add_action('elementor/editor/before_enqueue_scripts', 'fs_plus_addon_patch');

function fs_plus_addon_patch(){
	$dir = plugin_dir_url(__FILE__);
	wp_enqueue_style('error-correction' , $dir . 'css/error-correction.css', array(), '1.0.0', 'all');
}


//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshyMichael/elementor-plus-addons-error-corrections',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'elementor-plus-addons-error-corrections'
);
//Enable Releases
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//Optional: If you're using a private repository, specify the access token like this:
//
//
//Future Update Note: Comment in these sections and add token and branch information once private git established
//
//
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//______________________________________________________________________________
/* The Plus Addons for Elementor - Error Patch || End */
?>
