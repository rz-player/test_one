<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 9/18/2018
 * Time: 7:48 AM
 */

/* Подкл пространство имён *ИМЕНИ* проекта (требование PSR-standarts) */
namespace Brevis;

/* задаём использование псевдонимов — возможность указать короткое имя для класса */
use \Fenom as Fenom; 
use \xPDO\xPDO as xPDO;
use \Exception as Exception;
use \Parsedown as Parsedown;

class Core {
    public $config = array();
    /** @var Fenom $fenom */
    public $fenom;
    /** @var xPDO $xpdo */
    public $xpdo;
    /** @var Parsedown $parser */
    public $parser;


    /**
     * Конструктор класса
     *
     * @param string $config Имя файла с конфигом
     */
    function __construct($config = 'config') {
        if (is_string($config)) {
            $config = dirname(__FILE__) . "/Config/{$config}.inc.php";
            if (file_exists($config)) {
                require $config;
                /** @var string $database_dsn */
                /** @var string $database_user */
                /** @var string $database_password */
                /** @var array $database_options */
                try {
                    $this->xpdo = new xPDO($database_dsn, $database_user, $database_password, $database_options);
                    /* добавляем Модель для XPDO */
                    $this->xpdo->setPackage('Model', PROJECT_CORE_PATH);
                    $this->xpdo->startTime = microtime(true);
                } catch (Exception $e) {
                    exit($e->getMessage());
                }
            } else {
                exit('Не могу загрузить файл конфигурации');
            }
        } else {
            exit('Неправильное имя файла конфигурации');
        }

        $this->xpdo->setLogLevel(defined('PROJECT_LOG_LEVEL') ? PROJECT_LOG_LEVEL : xPDO::LOG_LEVEL_ERROR);
        $this->xpdo->setLogTarget(defined('PROJECT_LOG_TARGET') ? PROJECT_LOG_TARGET : 'FILE');

    }
    /*Или мы загружаем xPDO, или отказываемся работать вовсе.*/

    /**
     * Обработка входящего запроса
     *
     * @param $uri
     */
    public function handleRequest($uri) {
        $request = explode('/', $uri);

        $className = '\Brevis\Controllers\\' . ucfirst(array_shift($request));

        /** @var Controller $controller */
        // Если нужного контроллера нет, то используем контроллер Home
        if (!class_exists($className)) {
            $controller = new Controllers\Home($this);
        }
        else {
            $controller = new $className($this);
        }
        //▼RZ: Добавление значения в публичное свойство isAjax
        $controller->isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';

        $initialize = $controller->initialize($request);
        if ($initialize === true) {
            $response = $controller->run();
        }
        elseif (is_string($initialize)) {
            $response = $initialize;
        }
        else {
            $response = 'Возникла неведомая ошибка при загрузке страницы';
        }
        //▼RZ: Если контроллер в режиме AJAX, но получил Ошибку запроса(success:false) -то передать JSON-ошибку. *типа того
        if ($controller->isAjax) {
            $this->ajaxResponse(false, 'Не могу обработать ajax запрос');
        }
        else {
            echo $response;
        }
    }
    /*Как видите, мы определяем полное имя загружаемого контроллера, проверяем его наличие,
                       а если такого контроллера нет — загружаем \Brevis\Controllers\Home. */

/*    Подключение Fenom   */
    /**
     * Получение экземпляра класса Fenom
     *
     * @return bool|Fenom
     */
    public function getFenom() {
        if (!$this->fenom) {
            try {
                if (!file_exists(PROJECT_CACHE_PATH)) {
                    mkdir(PROJECT_CACHE_PATH);
                }
                /*Просто вызываем Fenom::factrory — и он сам загрузится.*/
                $this->fenom = Fenom::factory(PROJECT_TEMPLATES_PATH, PROJECT_CACHE_PATH, PROJECT_FENOM_OPTIONS);
            }
            catch (Exception $e) {
                $this->log($e->getMessage());
                return false;
            }
        }

        return $this->fenom;
    }


    /**
     * Получение парсера текстов
     *
     * @return Parsedown
     */
    public function getParser() {
        if (!$this->parser) {
            $this->parser = new Parsedown();
        }

        return $this->parser;

    }



    /**
     * Метод удаления директории с кэшем
     *
     */
    public function clearCache() {
        /* $this->rmDir($this->config['cachePath']); */
        Core::rmDir(PROJECT_CACHE_PATH);
        mkdir(PROJECT_CACHE_PATH);
    }


    /**
     * Логирование. Пока просто выводит ошибку на экран.
     *
     * @param $message
     * @param $level
     */
    public function log($message, $level = E_USER_ERROR) {
        if (!is_scalar($message)) {
            $message = print_r($message, true);
        }
        trigger_error($message, $level);
    }



    /* RZ: описание: Мы проходим по всем установленным пакетам и удаляем нам ненужное. Обратите внимание, что метод объявлен как public static. Статичный       означает, что он может быть вызван без инициализации класса. То есть, он является собственностью самого класса, а не его экземпляра. Например в          языке Swift подобные методы так и называются — class func. */
    /* Метод обязан быть статичным, чтобы Composer мог вызывать его после установки или обновления пакетов.
         Ведь он же не будет инициализировать наш класс — просто не знает, как это делать.*/
    /* Так как статичный метод работает не в экземпляре класса, он не может вызывать другие не статичные методы.
         То есть, никакого $this->method() нет и быть не может!
         Поэтому используемый им rmDir мы тоже делаем public static и меняем его вызов в методе clearCache:*/
    /**
     * Удаление ненужных файлов в пакетах, установленных через Composer
     *
     * @param mixed $base
     */
    public static function cleanPackages($base = '') {
        // Composer при вызове метода передаёт внутрь свой объект, но нам это не нужно
        // Значит, если передана не строка, то это первый запуск и мы стартуем от директории вендоров
        if (!is_string($base)) {
            $base = dirname(dirname(__FILE__)) . '/vendor/';
        }
        // Получаем все директории и
        if ($dirs = @scandir($base)) {
            // Проходим по ним в цикле
            foreach ($dirs as $dir) {
                // Символы выхода из директории нас не интересуют
                if (in_array($dir, array('.', '..'))) {
                    continue;
                }
                $path = $base . $dir;
                // Если это директория, а не файл
                if (is_dir($path)) {
                    // И она в следующем списке
                    if (in_array($dir, array('tests', 'test', 'docs', 'gui', 'sandbox', 'examples', '.git'))) {
                        // Удаляем её, вместе с поддиректориями
                        Core::rmDir($path);
                    }
                    // А если не в списке - рекурсивно проверяем её дальше, этим же методом
                    else {
                        // Просто передавая в него нужный путь
                        Core::cleanPackages($path . '/');
                    }
                }
                // А если это файл, то удаляем все, кроме php
                elseif (pathinfo($path, PATHINFO_EXTENSION) != 'php') {
                    unlink($path);
                }
            }
        }
    }

    /**
     * Рекурсивное удаление директорий
     *
     * @param $dir
     */
    public static function rmDir($dir) {
        $dir = rtrim($dir, '/');
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != '.' && $object != '..') {
                    if (is_dir($dir . '/' . $object)) {
                        Core::rmDir($dir . '/' . $object);
                    }
                    else {
                        unlink($dir . '/' . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    /**
     * Вывод ответа в установленном формате для всех Ajax запросов
     *
     * @param bool|true $success
     * @param string $message
     * @param array $data
     */
    public function ajaxResponse($success = true, $message = '', array $data = array()) {
        $response = array(
            'success' => $success, // успех или ошибка операции
            'message' => $message, // произвольное сообщение о статусе операции
            'data' => $data, // массив с данными для работы, который выдал контроллер
        );

        exit(json_encode($response)); // прерываем всю работу и выдаём ответ в JSON
    }





}