<?php
/*
Plugin Name: Which Template
Plugin URI: http://wordpress.org/extend/plugins/which-template/
Description: Helps the admin user work out which template a particular page is using.

Installation:

1) Install WordPress 3.5.2 or higher

2) Download the latest from:

http://wordpress.org/extend/plugins/which-template 

3) Login to WordPress admin, click on Plugins / Add New / Upload, then upload the zip file you just downloaded.

4) Activate the plugin.

Version: 1.0
Author: TheOnlineHero - Tom Skroza
License: GPL2
*/

add_action("admin_bar_menu", "which_template_customize_menu");

function which_template_customize_menu() {
    global $wp_admin_bar;
		$template = get_post_meta( get_the_id(), '_wp_page_template', true );
		if ($template != "") {
			$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=".$template."&theme=".wp_get_theme()->Template;
			if ($template_link != "") {
				$wp_admin_bar->add_menu(array(
				   "id" => "whichtemplatemenu",
				   "title" => "Template: ".$template,
				   "href" => $template_link,
				   "meta" => array("target" => "blank")
				));
			}
		}
}

?>