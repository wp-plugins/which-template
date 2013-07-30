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

Version: 2.0
Author: TheOnlineHero - Tom Skroza
License: GPL2
*/

add_action("admin_bar_menu", "which_template_customize_menu");

function which_template_customize_menu() {
  global $wp_admin_bar;
	$template = get_post_meta( get_the_id(), '_wp_page_template', true );
	$template_link = "";
	if ($template != "") {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=".$template."&theme=".wp_get_theme()->Template;
	} else if (is_page()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=page.php&theme=".wp_get_theme()->Template;
		$template = "page.php";
	} else if (is_single()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=single.php&theme=".wp_get_theme()->Template;
		$template = "single.php";
	}	else if (is_search()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=search.php&theme=".wp_get_theme()->Template;
		$template = "search.php";
	} else if (is_category()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=category.php&theme=".wp_get_theme()->Template;
		$template = "category.php";
	} else if (is_archive()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=archive.php&theme=".wp_get_theme()->Template;
		$template = "archive.php";
	} else if (is_tag()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=tag.php&theme=".wp_get_theme()->Template;
		$template = "tag.php";
	} else if (is_404()) {
		$template_link = get_option("siteurl")."/wp-admin/theme-editor.php?file=404.php&theme=".wp_get_theme()->Template;
		$template = "404.php";
	}

	if ($template_link != "") {
		$wp_admin_bar->add_menu(
			array(
			  "id" => "whichtemplatemenu",
			  "title" => "Template: ".$template,
			  "href" => $template_link,
			  "meta" => array("target" => "blank")
			)
		);
	}
}

?>