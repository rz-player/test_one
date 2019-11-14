<?php

ini_set('display_errors', 1);
ini_set('error_reporting', -1);

// Строка соединения с БД. Тип, хост, имя БД и кодировка
$database_dsn = 'mysql:host=127.0.0.1;dbname=bezumkin;charset=utf8';
// БД юзер
$database_user = 'bezumkin';
// Пароль юзера для БД
$database_password = 'bezumkin';


if (!defined('PROJECT_NAME')) {
    define('PROJECT_NAME', 'Brevis');
    define('PROJECT_NAME_LOWER', 'brevis');
}
if (!defined('PROJECT_SITE_URL')) {
    define('PROJECT_SITE_URL', 'http://bezumkin.me');
}
if (!defined('PROJECT_BASE_URL')) {
    define('PROJECT_BASE_URL', '/');
}
if (!defined('PROJECT_BASE_PATH')) {
    define('PROJECT_BASE_PATH', strtr(realpath(dirname(dirname(dirname(__FILE__)))), '\\', '/') . '/');
}
if (!defined('PROJECT_CORE_PATH')) {
    define('PROJECT_CORE_PATH', PROJECT_BASE_PATH . 'core/');
}
if (!defined('PROJECT_MODEL_PATH')) {
    define('PROJECT_MODEL_PATH', PROJECT_CORE_PATH . 'Model/');
}
if (!defined('PROJECT_TEMPLATES_PATH')) {
    define('PROJECT_TEMPLATES_PATH', PROJECT_CORE_PATH . 'Templates/');
}
if (!defined('PROJECT_CACHE_PATH')) {
    define('PROJECT_CACHE_PATH', PROJECT_CORE_PATH . 'Cache/');
}
if (!defined('PROJECT_LOG_PATH')) {
    define('PROJECT_LOG_PATH', PROJECT_CACHE_PATH . 'logs/');
}
if (!defined('PROJECT_ASSETS_PATH')) {
    define('PROJECT_ASSETS_PATH', PROJECT_BASE_PATH . 'assets/');
}
if (!defined('PROJECT_ASSETS_URL')) {
    define('PROJECT_ASSETS_URL', PROJECT_BASE_URL . 'assets/');
}

/*RZ: Заодно мы вынесли в настройки и параметры Fenom:*/
if (!defined('PROJECT_FENOM_OPTIONS')) {
    define('PROJECT_FENOM_OPTIONS', \Fenom::AUTO_RELOAD | \Fenom::FORCE_VERIFY);
}

/*RZ: вынесли настройки логирования XPDO */
if (!defined('PROJECT_LOG_LEVEL')) {
    define('PROJECT_LOG_LEVEL', \xPDO\xPDO::LOG_LEVEL_INFO);
}

if (!defined('PROJECT_LOG_TARGET')) {
    define('PROJECT_LOG_TARGET', 'HTML');
}

// Настройки xPDO: кэширование и загрузка свойств и связанных объектов
// Тут лучше ничего не трогать, оставить по умолчанию
$database_options = array(
    \xPDO\xPDO::OPT_CACHE_PATH => PROJECT_CACHE_PATH,
    \xPDO\xPDO::OPT_HYDRATE_FIELDS => true,
    \xPDO\xPDO::OPT_HYDRATE_RELATED_OBJECTS => true,
    \xPDO\xPDO::OPT_HYDRATE_ADHOC_FIELDS => true,
);