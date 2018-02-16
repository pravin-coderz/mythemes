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
define('DB_NAME', 'themes');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '4GsHXCAd]+@;3YdP2$G(BCBW1pQ7#=TD678gvFv=8[v-c0PlWV?zsF_Sr%ugTcLe');
define('SECURE_AUTH_KEY',  '/I^RShJo`H#5-y:`mw86,>eDh~&RD7COZcw_Z*>V*TTz5W:T@1?-URDRUN*MaWqX');
define('LOGGED_IN_KEY',    '>WuDvpc55sN}8Go_2WvnnEH/>{?J[@BBoO,kG _+1h5sQG$EkhBE}ckF.Lq&R46s');
define('NONCE_KEY',        '}q9FXo{&h>p1})6HY$,a*,h+jg6JCa|;)$i.@)oygt:I%)Oh%wObAQdIXMs %=e[');
define('AUTH_SALT',        'IH=L5Xj)j%SYW8%]>~.lQ^[ZM5jAw56:382#|zWw7_*B<S3dgh3>B4e}6c.S@#st');
define('SECURE_AUTH_SALT', 'ZqHA6}^xi e3[P1]R#7^4{}.L<hf$XLtdhFbx/_U>s=d9|~b0uMY(HV,|P$%BlyF');
define('LOGGED_IN_SALT',   'j;zwy*)h?soBw.f(%sKDHXj|K[F$ |9Q7^qx8,%[r6p<?)4[H`@WtEQ/]}Y(P?(]');
define('NONCE_SALT',       'a:A+Yg<,(1kXxaDvnK-Xv|xg _!Y{KpBm),?tEF=cd3PAC#o[wu+6K|IwOZ?n~{o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'w3sdp_';

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
