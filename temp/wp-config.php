<?php




//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
 // Added by WP Rocket

// BEGIN iThemes Security - Do not modify or remove this line
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
@ini_set( 'upload_max_filesize' , '1024M' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "getcanna_dev" );
/** MySQL database username */
define( 'DB_USER', "getcanna_dev" );
/** MySQL database password */
define( 'DB_PASSWORD', "9ykgrwlGQd6t" );
/** MySQL hostname */
define( 'DB_HOST', "localhost" );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F[cQm/J+pRN]9~XkQ|H8Q97ca4)#W/UMF W1KXjqdzsu#qPSqhOq56:;]4o#FiOk');
define('SECURE_AUTH_KEY',  'C6jL~s|8+s*.6!8ENA26ayBm@vxbK6|CDdlN{+mWTuGt#w6nmr~.sS=$72(g4}-f');
define('LOGGED_IN_KEY',    'U76,.n2wu04&E?i_^/[/J}I$M:4a=-igZ=p(d{-.-O1,W6d6|@jXzikq>2FR}|V7');
define('NONCE_KEY',        'xG<LWs3.x%dJDq^o-t~js;.F59|7;U40~C0Zs|,mk~1AmAm6n!=<,~m9YS:h%KK@');
define('AUTH_SALT',        '|DX(}u2_`Ww9NLxDtSwi?^9Crx|0xt7f<zSb0GOS_,t.D+SjAyJ;MfR>krBtUC==');
define('SECURE_AUTH_SALT', 'k{pPmgCTpUy>iA5x~d(vU+cgv2doDzL;iS7Ng6O|Nlj2|86cO28*|+gp$d6<pbMG');
define('LOGGED_IN_SALT',   'Iuxu3_XlD1~+Wl`b)W<+,stmd-j4H<Y>{i|wnn-Css%FrN79zi*y*E#15gI{Nh*{');
define('NONCE_SALT',       ';myM/,(jkHk%!(P6C~A,HyR3 ?qc6 .N!TH%shEEWig-3ZQHz[XJK*d|]6*H^J4q');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define( 'WP_MEMORY_LIMIT', '1024M' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';