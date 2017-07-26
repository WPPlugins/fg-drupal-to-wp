=== FG Drupal to WordPress ===
Contributors: Kerfred
Plugin Uri: https://wordpress.org/plugins/fg-drupal-to-wp/
Tags: drupal, wordpress, importer, convert drupal to wordpress, migrate drupal to wordpress, drupal to wordpress migration, migrator, converter, import, cck, location, name, address, addressfield, internationalization
Requires at least: 4.5
Tested up to: 4.8
Stable tag: 1.32.0
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=fred%2egilles%40free%2efr&lc=FR&item_name=fg-drupal-to-wp&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted

A plugin to migrate articles, stories, pages, categories, tags, images from Drupal to WordPress

== Description ==

This plugin migrates articles, stories, pages, categories, tags and images from Drupal to Wordpress.

It has been tested with **Drupal 5, 6, 7 & 8** and **Wordpress 4.8**. It is compatible with multisite installations.

Major features include:

* migrates the Drupal articles
* migrates the Drupal 6 stories
* migrates the Drupal basic pages
* migrates the Drupal categories
* migrates the Drupal tags
* migrates the Drupal images
* uploads all the posts media in WP uploads directories
* uploads external media (option)
* modifies the post content to keep the media links
* resizes images according to the sizes defined in WP
* defines the featured image to be the first post image (option)
* keeps the alt image attribute
* modifies the internal links

No need to subscribe to an external web site.

= Premium version =

The **Premium version** includes these extra features:

* migrates the comments
* migrates the authors
* migrates the administrators
* migrates the users
* migrates the custom post types
* migrates the custom taxonomies
* migrates the custom fields
* authenticates the users with their Drupal passwords
* SEO: redirects the Drupal URLs to the corresponding WordPress URLs

The Premium version can be purchased on: [https://www.fredericgilles.net/fg-drupal-to-wordpress/](https://www.fredericgilles.net/fg-drupal-to-wordpress/)

= Add-ons =

The Premium version allows the use of add-ons that enhance functionality:

* CCK Custom Content Kit
* Location custom fields
* Name custom fields
* Addressfield custom fields
* Internationalization
* NodeBlock fields

These modules can be purchased on: [https://www.fredericgilles.net/fg-drupal-to-wordpress/add-ons/](https://www.fredericgilles.net/fg-drupal-to-wordpress/add-ons/)

== Installation ==

1.  Install the plugin in the Admin => Plugins menu => Add New => Upload => Select the zip file => Install Now
2.  Activate the plugin in the Admin => Plugins menu
3.  Run the importer in Tools > Import > Drupal
4.  Configure the plugin settings. You can find the Drupal database parameters in the Drupal file sites/default/settings.php<br />

== Screenshots ==

1. Parameters screen

== Translations ==
* English (default)
* French (fr_FR)
* other can be translated

== Frequently Asked Questions ==

= I get the message: "[fg-drupal-to-wp] Couldn't connect to the Drupal database. Please check your parameters. And be sure the WordPress server can access the Drupal database. SQLSTATE[28000] [1045] Access denied for user 'xxx'@'localhost' (using password: YES)" =

* First verify your login and password to the Drupal database.
If Drupal and WordPress are not installed on the same host:
* If you use CPanel on the Drupal server, a solution is to allow a remote MySQL connection.
 - go into the Cpanel of the Drupal server
 - go down to Database section and click "Remote MySQL"
 - There you can add an access host (WordPress host). Enter the access host as the SOME-WEBSITE-DOMAIN-OR-IP-ADDRESS and click add host.
* Another solution is to copy the Drupal database on the WordPress database:
 - export the Drupal database to a SQL file (with phpMyAdmin for example)
 - import this SQL file on the same database as WordPress
 - run the migration by using WordPress database credentials (host, user, password, database) instead of the Drupal ones in the plugin settings.

= I get this error when testing the connection: "SQLSTATE[HY000] [2002] Connection refused" or "SQLSTATE[HY000] [2002] No such file or directory" =

* This error happens when the host is set like localhost:/tmp/mysql5d.sock
Instead, you must set the host to be localhost;unix_socket=/tmp/mysql5d.sock

= The migration stops and I get the message: "Fatal error: Allowed memory size of XXXXXX bytes exhausted" or I get the message: “Internal server error" =

* First, deactivate all the WordPress plugins except the ones used for the migration
* You can run the migration again. It will continue where it stopped.
* You can add: `define('WP_MEMORY_LIMIT', '512M');` in your wp-config.php file to increase the memory allowed by WordPress
* You can also increase the memory limit in php.ini if you have write access to this file (ie: memory_limit = 1G). See the <a href="https://premium.wpmudev.org/blog/increase-memory-limit/" target="_blank">increase memory limit procedure</a>.

= The media are not imported =

* Check the URL field that you filled in the plugin settings. It must be your Drupal home page URL and must start with http:// or https://

= The media are not imported and I get the error message: "Warning: copy() [function.copy]: URL file-access is disabled in the server configuration" =

* The PHP directive "Allow URL fopen" must be turned on in php.ini to copy the medias. If your remote host doesn't allow this directive, you will have to do the migration on localhost.

= I get the message: "Fatal error: Class 'PDO' not found" =

* PDO and PDO_MySQL libraries are needed. You must enable them in php.ini on the WordPress host.<br />
Or on Ubuntu:<br />
sudo php5enmod pdo<br />
sudo service apache2 reload

= I get this error: PHP Fatal error: Undefined class constant 'MYSQL_ATTR_INIT_COMMAND' =

* You have to enable PDO_MySQL in php.ini on the WordPress host. That means uncomment the line extension=pdo_mysql.so in php.ini

= Does the migration process modify the Drupal site it migrates from? =

* No, it only reads the Drupal database.

= I get this error: Erreur !: SQLSTATE[HY000] [1193] Unknown system variable 'NAMES' =

* It comes from MySQL 4.0. It will work if you move your database to MySQL 5.0 before running the migration.

= I get this error "Parse error: syntax error, unexpected T_PAAMAYIM_NEKUDOTAYIM" =

* You must use at least PHP 5.3 on your WordPress site.

= I get this error: SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client =

* It is a compatibility issue with your version of MySQL.<br />
You can read this post to fix it: http://forumsarchive.laravel.io/viewtopic.php?id=8667

= None image get transferred into the WordPress uploads folder. I'm using Xampp on Windows. =

* Xampp puts the htdocs in the applications folder which is write protected. You need to move the htdocs to a writeable folder.

= Do I need to keep the plugin activated after the migration? =

* No, you can deactivate or even uninstall the plugin after the migration (for the free version only).

= My screen hangs because of a lot of errors in the log window =

* You can stop the log auto-refresh by unselecting the log auto-refresh checkbox


Don't hesitate to let a comment on the [forum](https://wordpress.org/support/plugin/fg-drupal-to-wp) or to report bugs if you found some.

== Changelog ==

= 1.32.0 =
* New: Check if the NodeBlock add-on is necessary

= 1.31.0 =
* New: Check if we need the CCK add-on (Drupal 5)

= 1.28.0 =
* New: Modify internal links in drafts

= 1.27.0 =
* New: Block the import if the URL field is empty and if the media are not skipped
* New: Add error messages and information

= 1.25.0 =
* New: Add the percentage in the progress bar
* New: Display the progress and the log when returning to the import page
* Change: Restyling the progress bar
* Fixed: Typo - replace "complete" by "completed"
* Tested with WordPress 4.8

= 1.23.2 =
* Fixed: Allow media src containing extra spaces
* Tested with Drupal 5

= 1.23.1 =
* Tested with WordPress 4.7.4

= 1.22.0 =
* Tweak: Add a hook

= 1.19.0 =
* New: Check if we need the Internationalization module
* Tweak: Add some hooks for internationalization
* Fixed: Images not imported on Drupal 8
* Tested with WordPress 4.7.3

= 1.18.0 =
* New: Migrates the Drupal 6 stories

= 1.17.0 =
* New: Import the images stored on Amazon S3
* New: Check if we need the Ubercart add-on

= 1.16.4 =
* Fixed: Medias that are not in the standard /sites/default/files directory were not imported
* Fixed: [ERROR] Error:SQLSTATE[42S02]: Base table or view not found: 1146 Table 'field_data_field_image' doesn't exist
* Tested with WordPress 4.7.2

= 1.16.2 =
* Fixed: Images not imported on some servers
* Tested with WordPress 4.7.1

= 1.16.1 =
* Tweak: Code refactoring

= 1.16.0 =
* New: Import the images descriptions

= 1.15.1 =
* Fixed: Existing images attached to imported posts were removed when deleting the imported data
* Tested with WordPress 4.7

= 1.14.1 =
* Fixed: Images not imported if there is no node summary

= 1.14.0 =
* New: Can import taxonomies terms with a same name and a different parent
* New: Check if the Name add-on is needed
* New: Check if the Addressfield add-on is needed
* Tweak: Taxonomies import speed increased

= 1.13.0 =
* Fixed: Wrong progress bar color

= 1.12.3 =
* Fixed: Notice: register_post_type was called incorrectly. Post type names must be between 1 and 20 characters in length.
* Tweak: Add the fgd2wp_post_save_button_click hook
* Tweak: Add the fgd2wp_post_import_taxonomies hook

= 1.12.2 =
* Fixed: The progress bar didn't move during the first import
* Fixed: The log window was empty during the first import

= 1.12.0 =
* Tweak: Add the fgd2wp_database_connection_successful hook

= 1.11.2 =
* Fixed: The "IMPORT COMPLETE" message was still displayed when the import was run again

= 1.11.1 =
* Fixed: The images protected by a user agent protection were not imported

= 1.11.0 =
* New: Check if the Metatag add-on is needed
* Fixed: Database passwords containing "<" were not accepted

= 1.10.1 =
* Tweak: Code refactoring

= 1.10.0 =
* New: Add a hook for Drupal 6 images
* Tweak: Code refactoring

= 1.9.0 =
* Fixed: Drupal 6 custom taxonomies containing spaces were not assigned to custom post types
* Fixed: Drupal 6 terms which taxonomy contains spaces were not imported
* Tweak: If the import is blocked, stop sending AJAX requests

= 1.8.1 =
* Fixed: Notice: Undefined index: body_summary
* Fixed: Notice: Undefined index: body_value

= 1.8.0 =
* New: Authorize the connections to Web sites that use invalid SSL certificates

= 1.7.0 =
* New: Check if the CCK add-on is needed
* New: Check if the Location add-on is needed

= 1.6.0 =
* New: Modify links like /node/xx and like /taxonomy/term/xx in the posts content

= 1.4.0 =
* New: Test if the Drupal database contains some URL alias

= 1.3.2 =
* Fixed: Drupal 6 nodes imported with a wrong revision

= 1.3.0 =
* New: Test if the Drupal database contains some custom post types and custom taxonomies

= 1.2.0 =
* New: Released a Premium version which migrates the comments and the users

= 1.1.1 =
* FAQ created
* Tested with WordPress 4.6.1

= 1.1.0 =
* New: Compatible with Drupal 6

= 1.0.0 =
* Initial version: Import Drupal articles, basic pages, categories, tags and images

== Upgrade Notice ==

= 1.32.0 =
New: Check if the NodeBlock add-on is necessary

= 1.31.0 =
New: Check if we need the CCK add-on (Drupal 5)

= 1.28.0 =
New: Modify internal links in drafts

= 1.27.0 =
New: Block the import if the URL field is empty and if the media are not skipped
New: Add error messages and information

= 1.25.0 =
New: Add the percentage in the progress bar
New: Display the progress and the log when returning to the import page
Change: Restyling the progress bar
Fixed: Typo - replace "complete" by "completed"
Tested with WordPress 4.8

= 1.23.2 =
Fixed: Allow media src containing extra spaces
Tested with Drupal 5

= 1.23.1 =
Tested with WordPress 4.7.4

= 1.22.0 =
Tweak: Add a hook

= 1.19.0 =
New: Check if we need the Internationalization module
Tweak: Add some hooks for internationalization
Fixed: Images not imported on Drupal 8
Tested with WordPress 4.7.3

= 1.18.0 =
New: Migrates the Drupal 6 stories

= 1.17.0 =
New: Import the images stored on Amazon S3
New: Check if we need the Ubercart add-on

= 1.16.4 =
Fixed: Medias that are not in the standard /sites/default/files directory were not imported
Fixed: [ERROR] Error:SQLSTATE[42S02]: Base table or view not found: 1146 Table 'field_data_field_image' doesn't exist
Tested with WordPress 4.7.2

= 1.16.2 =
Fixed: Images not imported on some servers
Tested with WordPress 4.7.1

= 1.16.1 =
Tweak: Code refactoring

= 1.16.0 =
New: Import the images descriptions

= 1.15.1 =
Fixed: Existing images attached to imported posts were removed when deleting the imported data
Tested with WordPress 4.7

= 1.14.1 =
Fixed: Images not imported if there is no node summary

= 1.14.0 =
New: Can import taxonomies terms with a same name and a different parent
New: Check if the Name add-on is needed
New: Check if the Addressfield add-on is needed
Tweak: Taxonomies import speed increased

= 1.13.0 =
Fixed: Wrong progress bar color

= 1.12.3 =
Fixed: Notice: register_post_type was called incorrectly. Post type names must be between 1 and 20 characters in length.

= 1.12.2 =
Fixed: The progress bar didn't move during the first import
Fixed: The log window was empty during the first import

= 1.12.0 =
Tweak: Add the fgd2wp_database_connection_successful hook

= 1.11.2 =
Fixed: The "IMPORT COMPLETE" message was still displayed when the import was run again

= 1.11.1 =
Fixed: The images protected by a user agent protection were not imported

= 1.11.0 =
New: Check if the Metatag add-on is needed
Fixed: Database passwords containing "<" were not accepted

= 1.10.1 =
Tweak: Code refactoring

= 1.10.0 =
New: Add a hook for Drupal 6 images
Tweak: Code refactoring

= 1.9.0 =
Fixed: Drupal 6 custom taxonomies containing spaces were not assigned to custom post types
Fixed: Drupal 6 terms which taxonomy contains spaces were not imported
Tweak: If the import is blocked, stop sending AJAX requests

= 1.8.1 =
Fixed: Notice: Undefined index: body_summary
Fixed: Notice: Undefined index: body_value

= 1.8.0 =
New: Authorize the connections to Web sites that use invalid SSL certificates

= 1.7.0 =
New: Check if the CCK add-on is needed
New: Check if the Location add-on is needed

= 1.6.0 =
New: Modify links like /node/xx and like /taxonomy/term/xx in the posts content

= 1.4.0 =
New: Test if the Drupal database contains some URL alias

= 1.3.2 =
Fixed: Drupal 6 nodes imported with a wrong revision

= 1.3.0 =
New: Test if the Drupal database contains some custom post types and custom taxonomies

= 1.2.0 =
New: Released a Premium version which migrates the comments and the users

= 1.1.1 =
FAQ created
Tested with WordPress 4.6.1

= 1.1.0 =
New: Compatible with Drupal 6

= 1.0.0 =
Initial version: Import Drupal articles, basic pages, categories, tags and images
