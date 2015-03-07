<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'ivanovo-dizel');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|mSF]B^:7vaF*1_#Sd4_hx%Zj~%,R[UA_!4uQX:HSSA_5E|Qa}n EC$Fy u|dxc ');
define('SECURE_AUTH_KEY',  'NI[+G9 ;_xGegH4  -I;|J2-bN/qTI8;&pZ`l jItD2n@~xZ@Z.g8qlO2r}*a]uD');
define('LOGGED_IN_KEY',    'x)<q&Xl.YFs,x>+rR_=T$by(?WNiBLdlKjjae=|Y@B8,Y=).V>p%+cr M-JW:krc');
define('NONCE_KEY',        '_&S<ShCUk}]PbSB#n:yJCEi{lp1?_Zcl&,#3btsJ],MyJGAE&*mJm:@d]Jcm@^dY');
define('AUTH_SALT',        'O[jSanZho~[^XX*cR0i<!y-4bw!w[t,CM7PRIQ3tvEi`}IC9q}7Y-jp L*C$K<r+');
define('SECURE_AUTH_SALT', '&9)S64*+m`d`,+mgfwAK~X`cj>hkAee9R437+KjDr~Q{Cpokj6CDa<Izj{LhdzCW');
define('LOGGED_IN_SALT',   'g+S:*=ZfDacABa/-|?9RI*9uvzW-%kg!Kz>hc}d(^ws]4nNftr_d*va<<M=oi2;E');
define('NONCE_SALT',       '$eGuwb)F$8Ytv0(w)&`rpsw,K4s6.>F<uP5y49^3(Z!Mo-[VL(%4*K0x3,Qf-)l=');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
