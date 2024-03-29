<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 9/18/2018
 * Time: 6:58 AM
 */
/*Настройка вывода ошибок переехала в файл конфигурации */

/*
Index.php должен принимать все запросы, которые будут отправляться на сайт. Вообще все, то есть в деле обработки запросов он самый главный. Именно он определяет, что запросили и что нужно показать в ответ.

Поэтому, он должен анализировать массив $_REQUEST, в котором находятся все данные, присланные пользовательским браузером.
Чтобы их увидеть, делаем так:

echo '<pre>';
print_r($_REQUEST);

Вот этот вот метод с распечаткой массива после вызова тега pre мы будем использовать очень часто, как средство простейшей диагностики. */
/*Давайте откроем укажем в URL параметр ?id=1 и увидим:
Array
(
    [id] => 1
)*/
//данные приходят в пеерменную q, которую мы ранее указали в настройках веб-сервера.

// Composer  у нас, вот тут
require_once dirname(__FILE__) . '/vendor/autoload.php';

// в index.php нам нужно инициализировать Core:
$Core = new \Brevis\Core();

$req = !empty($_REQUEST['q'])
    ? trim($_REQUEST['q'])
    : '';
/*Проверка, есть ли в запросе от сервера наша переменная q, и если нет — то запрошена корневая страница.
 Дальше в handleRequest передаётся или запрос или пустота, пусть уже он сам разбирается.*/

if (!defined('PROJECT_API_MODE') || !PROJECT_API_MODE) {
    $Core->handleRequest($req);
}
/*а метод handleRequest() теперь вызывается только если не был объявлен режим работы через API*/