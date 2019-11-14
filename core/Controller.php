<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 9/18/2018
 * Time: 11:13 AM
 */
/* Controller.php -базовый контроллер, от которого будут наследоваться все остальные */

/* Подкл пространство имён *ИМЕНИ* проекта */
namespace Brevis;

use \Exception as Exception;
use \Kilte\Pagination\Pagination as Pagination;

class Controller {
    /** @var Core $core */
    public $core;
    /** @var string $name */
    /* RZ: Проверяя {$_controller->name} всегда можно понять, на какой страницы мы находимся и отметить этот пункт в панели активным. */
    public $name = 'home';

    /** @var bool $isAjax */
    public $isAjax = false;

    /**
     * Конструктор класса, требует передачи Core
     *
     * @param Core $core
     */
    function __construct(Core $core) {
        $this->core = $core;
    }

    public function initialize(array $params = array()) {

        return true;
    }


    /**
     * Основной рабочий метод
     *
     * @return string
     */
    public function run() {
        return "Hello World!";
    }

    /**
     * Шаблонизация
     *
     * @param string $tpl Имя шаблона
     * @param array $data Массив данных для подстановки
     * @param Controller|null $controller Контроллер для передачи в шаблон
     *
     * @return mixed|string
     */
    public function template($tpl, array $data = array(), $controller = null) {
        $output = '';
        if (!preg_match('#\.tpl$#', $tpl)) {
            $tpl .= '.tpl';
        }
        if ($fenom = $this->core->getFenom()) {
            try {
                $data['_core'] = $this->core;
                $data['_controller'] = !empty($controller) && $controller instanceof Controller
                    ? $controller
                    : $this;
                $output = $fenom->fetch($tpl, $data);
            }
            catch (Exception $e) {
                $this->core->log($e->getMessage());
            }
        }
        return $output;
    }
    /* RZ: мы пытаемся оформить данные указанным шаблоном,
            а если этот процесс выбросит какое-то исключение, то мы запишем его в лог и вернём пустоту. */
    /* RZ: Нужно обратить внимание, что в этом методы мы передаём в массив данных наш объект Сore в переменную {$_core}
            — таким образом, шаблон сможет выполнять любые методы основного класса и получать системные настройки. */
    /* RZ: Для тех же целей рядышком и объект {$_controller}, который мы можем передать из дочернего контроллера.
             А если не передали — то там будет базовый контроллер. */

    /* RZ: MAIN: Таким образом, в любом шаблоне мы сразу получаем ссылку на ядро и контроллер
                со всеми их публичными методами и свойствами. Вот зачем мы изначально определяли эти public, protected и private
                — чтобы шаблон не мог использовать всё подряд.
*/
    /**
     * Возвращает пункты меню сайта
     *
     * @return array
     */
    public function getMenu() {
        return array(
            'home' => array(
                'title' => 'Главная',
                'link' => '/',
            ),
            'news' => array(
                'title' => 'Новости',
                'link' => '/news/',
            ),
            'test' => array(
                'title' => 'Тестовая',
                'link' => '/test/',
            )
        );
    }

    /**
     * Возвращает массив с постраничной навигацией
     *
     * @param $totalItems
     * @param int $currentPage
     * @param int $itemsPerPage
     * @param int $neighbours
     *
     * @return array
     */
    public function getPagination($totalItems, $currentPage = 1, $itemsPerPage = 10, $neighbours = 2) {
        $pagination = new Pagination($totalItems, $currentPage, $itemsPerPage, $neighbours);

        return $pagination->build();
    }

    /**
     * Редирект на указанный адрес
     *
     * @param string $url
     */
    public function redirect($url = '/') {
        if ($this->isAjax) {
            $this->core->ajaxResponse(false, 'Редирект на другой адрес', array('redirect' => $url));
        }
        else {
            header("Location: {$url}");
            exit();
        }
    }

}