<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bootplugin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&XRo*@kw#7bWq4KfRAHqD/-&yhn<nG9uXK7sq2~rl!}IL#qQem`ZhF%4M6SEN5om');
define('SECURE_AUTH_KEY',  '^0OO#QVP,ks{37=2@J0.qG_}]hg]&t*`oYK`s=nSJQK6ydsal`sI)>bAYVqLD_*t');
define('LOGGED_IN_KEY',    '}jV|*q5Of=HJI_o|Y+s ksl}lHqWz560uDF4$mvVS0y mUS.Jan88{|1gr[?%fCE');
define('NONCE_KEY',        '*kGX*LwnG%OI1n5ag:v+>j8;*^<D15.lK;00exVVaex%,5)!y$xO]3!;w7~9By i');
define('AUTH_SALT',        'Y%I#odO*^k}X{ZVbH[2C];.1E)`7E;fk^U67XvTRZimF]Hu:+ZbS}~%Sl&y;*rA)');
define('SECURE_AUTH_SALT', '@4NoOLxIM^yIv.C:PxI{RJ}o]pziX!qt+p/9PR_S}OJ;~KseI>7uqR$6=D`~4mw)');
define('LOGGED_IN_SALT',   '.M@]!gc5m]?mCSR bfgtQJ?Y>f[2Gao<Ve.6Gse1#t23VOJempC/[Ht{w3wY4<;o');
define('NONCE_SALT',       'eQxV!$}o000UUA,0ncKc(Tp;#f-`wu0gp@EW8rD5;4_PwD^zy_P2KJv/:*KIO,L]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
