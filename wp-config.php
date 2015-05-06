<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('RSVP_DATE','1st May');

if($_SERVER["SERVER_NAME"] == "aaronandhelen.local"){
	define('IS_DEV',true);
	define('DB_NAME', 'i1134229_wp1');
	define('DB_USER', 'root');
	if(PHP_OS == "WINNT"){
		define('IS_WINDOWS_DEV', true);
		define('DB_PASSWORD', '123');
	}else{
		define('IS_WINDOWS_DEV', false);
		define('DB_PASSWORD', 'spurs123');
	}
	define('DB_HOST', 'localhost');
}else{
	define('IS_DEV',false);
	// ** MySQL settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'i1134229_wp1');

	/** MySQL database username */
	define('DB_USER', 'i1134229_wp1');

	/** MySQL database password */
	define('DB_PASSWORD', '');

	/** MySQL hostname */
	define('DB_HOST', '');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '5[8;Iq-XDXH+3 -Nf8Z0-<(_2C|V?=OP$HXHZ?2-#x;ffdS~~#D{=k)Z&&Qi@6l~');
define('SECURE_AUTH_KEY',  'B%`;`B7HAg)+}~+`+tg)FpLf>Tp#I~t1v;SgcF>.S5TWEv`l7~Nk|M%L!w0KDBZR');
define('LOGGED_IN_KEY',    'MYkU^,^T3Wo(Ka+t+9[RKu6[TZy&NBC|:I5zJ$P?|A~?OjR,R+%9HV]|]8)xGy 5');
define('NONCE_KEY',        'Q@l%4!:LA$5+7Ry7p-=<%3-zR*6[k(>p^D;VqZ5{*3m(|LkbYQ[*Bd%|aLQg^^8#');
define('AUTH_SALT',        'p|)2S~K <epLI9TK3nW7GSlTwCvxy$o>4LlUZ@l9f8`gh=.9~t#5QYj0$d#<`b)/');
define('SECURE_AUTH_SALT', '%oLf?H^~0VQl2WmKgHt{@FIx42H]MV4tbr_9jB=]10kt8?O,iT9nyA6nL{)&X{**');
define('LOGGED_IN_SALT',   't8:=}dy$W6hf[I.|C7890-k?6~+C99nwUs#=-)cu7H4pT+wbd$xU*D ;2O;aTHe}');
define('NONCE_SALT',       'Y~-T1[+Z]T.] oBYh@^=`>swQd^^7*80%|oP7%&?[|xY,*+w3W-aH~Gm#inB4X(x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
//TODO set back to false;
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
