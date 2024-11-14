<?php
# BEGIN WP Cache by 10Web
define( 'WP_CACHE', true );
define( 'TWO_PLUGIN_DIR_CACHE', '/var/www/wp-content/plugins/tenweb-speed-optimizer/' );
# END WP Cache by 10Web
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "h2kc45325731863" );

/** Database username */
define( 'DB_USER', "h2kc45325731863" );

/** Database password */
define( 'DB_PASSWORD', "Ud9bON51oJ_." );

/** Database hostname */
define( 'DB_HOST', "10.205.25.182:3307" );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*J0zOT_6ND&9Lt#/I E9' );
define( 'SECURE_AUTH_KEY',  'kqnU-g%SxM5crzKx9sFz' );
define( 'LOGGED_IN_KEY',    '4awh*DsCjGEGcD1cvdcp' );
define( 'NONCE_KEY',        'j&5S6BM!C4_t$)) P fh' );
define( 'AUTH_SALT',        'an9-5((3bh&nQyN0rwFL' );
define( 'SECURE_AUTH_SALT', 'R$DV=YWGmya!yLB$zQ=k' );
define( 'LOGGED_IN_SALT',   '7V8jBjK=G2m2gry$9ssh' );
define( 'NONCE_SALT',       'KI_Dpp#/%1va@!%C4868' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_4wamv4cys6_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
//
require_once( dirname( __FILE__ ) . '/gd-config.php' );
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', (0705 & ~ umask()) );
define( 'FS_CHMOD_FILE', (0604 & ~ umask()) );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';