<?php
/**
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Setting MySQL ** //
/** Database Name MySQL */
define('DB_NAME', 'wp_api');

/** Database Username */
define('DB_USER', 'root');

/** Database Password */
define('DB_PASSWORD', '');

/** Database Hostname */
define('DB_HOST', 'localhost');
	
/** Database Charset */
define('DB_CHARSET', 'utf8');

/** Database Collate */
define('DB_COLLATE', '');

/**#@+
 * Secret-Key Service
 *
 * Using
 * {@Link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K8hL>ND4JUO4p12Q&xcOU(oe9|kTwbji(K C=bVfygv$koGN0qi-~4z!(]%ggALW');
define('SECURE_AUTH_KEY',  '7?}}P*]oJqTz`Q|N[<ta+6kEV$bf }|Qs&|81ej[auyP@6YiW;^JJ||,)Mls-L>t');
define('LOGGED_IN_KEY',    '/mhur6i+y~8]exz0jOPmkZqK+w>L6*-,*{6A rO4CKWfNX3U&4k<vCP?ZGo+L$&5');
define('NONCE_KEY',        'O6#XQ#P+:Ju(pd.Dov7< VAf4+_wh+]l)ut :jwK[GaTcg-z-i!KonrJYmN5BhWz');
define('AUTH_SALT',        '.-f,Ho,6z}ONek[dMgX|TP{CFr_9^9^l4NuaP?nj1]E v5z%+l-D|}$2&QS2LCMh');
define('SECURE_AUTH_SALT', '-~SH VRwl}$i?yxM=O*spy06GN9g94X %S|=4|$f|tarh*XK7{a=sD](C{]kX-Pz');
define('LOGGED_IN_SALT',   'er>DS|DTl%m)0P.:LnGhcklj^;1ch-WP7[oefQ|DgT{LD.q3qw,-h?o{Jed,PTy2');
define('NONCE_SALT',       'yt~+{lETgn+=SRlg)q7#a?:22X9Ub?)0T9cDL;^2P^0KF-}O}[E7;Rl1(/O9}$+&');

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
require_once(ABSPATH . 'wp-custom-api.php');
