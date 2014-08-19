<?php
/**
 * Plugin Name: App it Up!
 * Plugin URI: http://vallgroup.com/App-it-up.php
 * Description: Turn your Wordpress site into an iPhone/iPad App! When a user saves your site to their device's home screen your site immediately looks and behaves like a native app.
 * Version: 1.0
 * Author: Vallroup LLC
 * Author URI: http://vallgroup.com
 * License: GPL2
 */

/*  Copyright 2014  Vallgroup LLC  (email : info@vallgroup.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Start the Plugin
*
*	Start the plugin when in the admin backend.
*
**/
if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'vg_creat_admin_menu' );
}

/* Create admin menu
*
*	This function creates our admin menu, enqueues our scriipts and calls our register settings function
*
**/
function vg_creat_admin_menu() {
	//create new top-level menu
	$page = add_menu_page('App it Up!', 'App it Up!', 'administrator', __FILE__, 'vg_create_appitup_page', plugins_url('/images/vg_icon_small.png', __FILE__));
	//call register settings function
	add_action( 'admin_init', 'vg_register_appitup_settings' );	
}

/* Register Settings
*
*	This registers all our options.
*
**/
function vg_register_appitup_settings() { 
	register_setting( 'vg_appitup_options', 'vg_app_name' );
	register_setting( 'vg_appitup_options', 'vg_status_bar' );
	register_setting( 'vg_appitup_options', 'vg_icon_57x57' );
	register_setting( 'vg_appitup_options', 'vg_icon_72x72' );
	register_setting( 'vg_appitup_options', 'vg_icon_114x114' );
	register_setting( 'vg_appitup_options', 'vg_icon_144x144' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_320x460' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_640x920' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_640x1096' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_768x1004' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_1024x748' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_1536x2008' );
	register_setting( 'vg_appitup_options', 'vg_startup_image_2048x1496' );
	register_setting( 'vg_appitup_options', 'vg_app_behave' );
	register_setting( 'vg_appitup_options', 'vg_use_jquery' );
}

/* Create Settings Page
*
*	This function outputs all out html for the plugin's settings page
*
**/
if (!function_exists('vg_create_appitup_page')) {
	function vg_create_appitup_page() {
		wp_enqueue_media();
		//require the settings page html
		require_once('app-it-up-settings-page.php');
	}
}

/* Load scripts and styles
*
*	This function loads our scripts and styles
*
**/
if (!function_exists('vg_enqueue_scripts')) {
	function vg_enqueue_scripts() {
		wp_register_style('FontAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
		wp_register_style('vg_Style', plugins_url('app-it-up/app-it-up.css'), array('FontAwesome'));
		wp_register_script('vg_Script', plugins_url('app-it-up/app-it-up.js'), array('jquery'));
		
		if (isset($_GET['page']) && ($_GET['page'] == 'app-it-up/app-it-up.php')) {
			wp_enqueue_style('vg_Style');
			wp_enqueue_script('vg_Script');
		}
	}
}
add_action('admin_enqueue_scripts', 'vg_enqueue_scripts');

/* Insert Head
*
*	This function inserts all our options into the head of the site.
*	This allows the site to be saved as an app in the device's home screen
*
**/
if (!function_exists('vg_insert_to_head')) {
	function vg_insert_to_head() {
		$name = get_option('vg_app_name');
		$statusbar = get_option('vg_status_bar');

		?>
			<!-- Apple App Capable -->			
			<meta name="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $statusbar; ?>">
			<meta name="apple-mobile-web-app-title" content="<?php echo $name; ?>">
			
			<?php if(get_option('vg_icon_57x57')) : ?>
			<!-- iPhone ICON -->			
	        <link href="<?php echo get_option('vg_icon_57x57'); ?>" sizes="57x57" rel="apple-touch-icon">
	    	<?php endif; ?>
	    	<?php if(get_option('vg_icon_72x72')) : ?>
	        <!-- iPad ICON-->
	        <link href="<?php echo get_option('vg_icon_72x72'); ?>" sizes="72x72" rel="apple-touch-icon">
	    	<?php endif; ?>
	    	<?php if(get_option('vg_icon_114x114')) : ?>
	        <!-- iPhone (Retina) ICON-->
	        <link href="<?php echo get_option('vg_icon_114x114'); ?>" sizes="114x114" rel="apple-touch-icon">
	    	<?php endif; ?>
	    	<?php if(get_option('vg_icon_144x144')) : ?>
	        <!-- iPad (Retina) ICON-->
	        <link href="<?php echo get_option('vg_icon_144x144'); ?>" sizes="144x144" rel="apple-touch-icon">
	    	<?php endif; ?>
			
			<?php if(get_option('vg_startup_image_320x460')) : ?>
	        <!-- iPhone SPLASHSCREEN-->
			<link href="<?php echo get_option('vg_startup_image_320x460'); ?>" media="(device-width: 320px)" rel="apple-touch-startup-image">
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_640x920')) : ?>
			<!-- iPhone (Retina) SPLASHSCREEN-->
			<link href="<?php echo get_option('vg_startup_image_640x920'); ?>" media="(device-width: 320px) and (device-height: 460px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_640x1096')) : ?>
			<!-- iPhone 5 (Retina) SPLASHSCREEN-->
			<link href="<?php echo get_option('vg_startup_image_640x1096'); ?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_768x1004')) : ?>
			<!-- iPad (non-Retina) (Portrait) -->
			<link href="<?php echo get_option('vg_startup_image_768x1004'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" rel="apple-touch-startup-image" />
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_1024x748')) : ?>
			<!-- iPad (non-Retina) (Landscape) -->
			<link href="<?php echo get_option('vg_startup_image_1024x748'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" rel="apple-touch-startup-image" />
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_1536x2008')) : ?>
			<!-- iPad (Retina) (Portrait) -->
			<link href="<?php echo get_option('vg_startup_image_1536x2008'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) and (-webkit-min-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
			<?php endif; ?>
			<?php if(get_option('vg_startup_image_2048x1496')) : ?>
			<!-- iPad (Retina) (Landscape) -->
			<link href="<?php echo get_option('vg_startup_image_2048x1496'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) and (-webkit-min-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
			<?php endif; ?>
		<?php
	}	
}
add_action('wp_head', 'vg_insert_to_head');

/* Insert Footer
*
*	This funcition inserts the necessary jQuery or Javascript to make the site
*	feel and behave like a native app. Without this, every link in the site will open 
*	in Safari and not within the app like a native application does.
*
**/
if(!function_exists('vg_insert_to_footer')) {
	function vg_insert_to_footer() {
		$app = get_option('vg_app_behave');

		if($app){
			$jquery = get_option('vg_use_jquery');

			if($jquery){
				$footer = '				
					<script>
						/* Prevent links from opening in safari when in app mode	 */
						jQuery(function($){						
							var a = $("a");

							a.each(function(){
								$(this).click(function(){
								if( $(this).attr("target") !== "_blank" || $(this).attr("href") !== \'#\' ){
									window.location = $(this).attr("href");
									return false;
								}
								});
							})
						});						
						/* End links code */
					</script>
				';
			}
			else{
				$footer = '
					<script>
						/* Prevent links from opening in safari when in app mode	 */
						var a=document.getElementsByTagName("a");
						for(var i=0;i<a.length;i++) {
							if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
							    a[i].onclick=function() {
							    	if(this.getAttribute("href") !== \'#\') {
								        window.location=this.getAttribute("href");
								        return false; 
								    }
						            window.location=this.getAttribute("href");
						            return false; 
							    }
							}
						}
						/* End links code */
					</script>
				';
			}
			echo $footer;
		}
		else{
			return false;
		}
			
	}
}
add_action('wp_footer', 'vg_insert_to_footer');
?>