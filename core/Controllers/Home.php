<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 9/18/2018
 * Time: 9:24 AM
 */
namespace Brevis\Controllers;

use Brevis\Controller as Controller;



class Home extends Controller {

    /* Нам не нужно, чтобы страница открывалась как /home/ — ведь это же корень сайта. Так что, проверяем переменную $_REQUEST['q']
     и если она не пуста, то делаем редирект в корень сайта.*/
    /**
     * @param array $params
     *
     * @return bool
     */
    public function initialize(array $params = array()) {
        if (!empty($_REQUEST['q'])) {
            $this->redirect('/');
        }
        return true;
    }

    /**
     * Основной рабочий метод
     *
     * @return string
     */
    public function run() {
        return $this->template('home', array(
            'pagetitle' => 'Тестовый сайт',
            'longtitle' => 'Работа на чистом PHP - Третий курс обучения',
            'content' => 'Текст главной страницы курса обучения на RusCams.ru',
        ), $this);
    }
    /* RZ: Как видите, последним параметром мы передаём ссылку на сам контроллер Home. */



}