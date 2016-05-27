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
define('DB_NAME', 'boxpop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'U{ 6RX:i?9T.W&v:N}aoB2{Gl@[Z9M q8}n+1pw>u-VcIk<47T,DFx+zbO(|36V|');
define('SECURE_AUTH_KEY',  '<JDrQkCe107`D,SRJ<U.94|v?~$as2{  9(#teT%g#Y9F49Wvo^?0Gb<V(vj?Fu.');
define('LOGGED_IN_KEY',    '$VpcL}VXTVe^B@<D&QT>NLL${ga>+]mTbqp5lG6v8l(uPo9Y9QpxPB*B-:%wE6A6');
define('NONCE_KEY',        '?/YcaAI^7z=YWj^@l)&tTq*E|;z<7FnG=a43eOj_t>BO(ZX.Q8Ae,}G|9z?pSri|');
define('AUTH_SALT',        'J({JU_+yan=_!K<L:_OKW7xkCT/iyIVcW+w7Pwd9)aX.xw!4p8Z86zvY&<|EV.2A');
define('SECURE_AUTH_SALT', '<)[#q1,!oy<JXt.O<7vSFVe5!?,Dt]i|V#^0p+{$(Ow]S0+` 3Nu^%&rpI .dI.b');
define('LOGGED_IN_SALT',   'GSTDE<e%S6hy}wWy~][U{);PlX*.>L^;+`e0JvaPXZ*#xgr)M~[S|tyoe|H%#TNp');
define('NONCE_SALT',       '2--g@xl||UT+S?+y]mZHtB><Cy=E<Grl^*DDKvzn<>0^-c3T-Ff<00:cCPzu@|T.');

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
