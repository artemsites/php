<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:27
 */
/**
 ***************************************** ФРОНТ КОНТРОЛЛЕР - FRONT CONTROLLER ****************************************
 * Чем же тогда является index.php? Это ведь и точка входа, и место,
 * где мы создаём сам контроллер и вызываем его методы.
 * Этот кусок кода называется фронт-контроллером.
 */
require_once 'src/autoLoader.php';

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';
var_dump($routes);

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0]; // '\MVCExample\Controllers\MainController'
$actionName = $controllerAndAction[1]; // 'main' или 'sayHello' или другое из массива в routes.php
var_dump($matches);
/**
 * Да! Прямо вот так! Переменную можно использовать в качестве имени класса при создании объекта.
 */
$controller = new $controllerName();
/**
 * И даже вместо имени метода!
 *
 * Остаётся только один вопрос – как элементы массива передать в аргументы метода? Для этого в PHP есть
 * специальный оператор троеточия: method(...$array)
 * Он передаст элементы массива в качестве аргументов методу в том порядке, в котором они находятся в массиве.
 */
$controller->$actionName(...$matches);

/**
 * ДЗ:
 * Создайте еще один экшн в контроллере – sayBye(string $name), который будет выводить «Пока, $name».
 * Добавьте для него роут /bye/$name и убедитесь, что всё работает.
 */



////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************** ЧПУ **********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
//var_dump($_GET['route']); // <--- .htaccess

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** РОУТИНГ ********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
//$route = $_GET['route'] ?? '';
//$pattern = '~^hello/(.*)$~';
/**
 * Обратите внимание – в качестве ограничителя шаблона регулярного выражения мы использовали тильду - ~.
 * Мы выбрали её вместо слэша, чтобы не экранировать слэш в адресной строке.
 * Напомню, что в качестве ограничителя может выступать вообще любой символ.
 */
//preg_match($pattern, $route, $matches);
//var_dump($matches);

/**
 * array (size=2)
 * 0 => string 'hello/username' (length=14) Нулевой элемент – полное совпадение по паттерну.
 * 1 => string 'username' (length=8) Первый элемент – значение, попавшее в маску (.*), то есть всё, что идёт после hello/.
 */

/**
 * Давайте теперь добавим проверку того, что если $matches не пустой, то будем создавать контроллер MainController и
 * вызывать у него экшен hello. В качестве аргумента будем передавать ему значение из массива по ключу 1.
 */
//if (!empty($matches)) {
//    $controller = new \MVCExample\Controllers\MainController();
//    $controller->sayHello($matches[1]);
//    return;
//}

/**
 * Давайте теперь добавим обработку случая, когда мы просто зашли на http://myproject.loc/.
 * В таком случае переменная route будет пустой строкой. Регулярка для такого случая - ^$.
 * Да, просто начало строки и конец строки. Проще не бывает!
 */
//$pattern = '~^$~'; // - пустая строка
//preg_match($pattern, $route, $matches);
//
//if (!empty($matches)) {
//    $controller = new \MVCExample\Controllers\MainController();
//    $controller->main();
//    return;
//}

/**
 * Остаётся только добавить обработку случая, когда ни одна из этих регулярок не подошла и просто вывести сообщение
 * о том что страница не найдена.
 * Давайте просто добавим в конце index.php строку:
 */
//echo 'Страница не найдена';

/**
 * Давайте создадим отдельный файл с такой конфигурацией.
 *  Пусть это будет файл src/routes.php. Запишем в него следующее содержимое:
 */

//$controller = new \MVCExample\Controllers\MainController();
//
//if (!empty($_GET['name'])) {
//    $controller->sayHello($_GET['name']);
//} else {
//    $controller->main();
//}