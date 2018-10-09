<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 04.09.18
 * Time: 12:49
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** МАССИВЫ: ********************************************/
/**
 * Создание массива:
 */
$someArray = [];

/**
 * Вообще говоря, эти ключи можно задать самому, ещё при создании массива. Вот так:
 */
$fruits = [5 => 'apple', 3 => 'orange', 9 => 'grape'];
var_dump($fruits);

/**
 * УДАЛИТЬ ПОСЛЕДОВАТЕЛЬНОСТЬ ЭЛЕМЕНТОВ МАССИВА И ЗАМЕНИТЬ ЕЁ ДРУГОЙ ПОСЛЕДОВАТЕЛЬНОСТЬЮ
 */
array_slice($array, 1, 3, true);
// массив, от куда начать, кол-во, сохранить ключи?


/**
 * УДАЛИТЬ ЭЛЕМЕНТ МАССИВА
 * https://webshake.ru/php-training-course/13
 */
$fruits = ['apple', 'orange', 'grape'];

$fruits[] = 'mango';

unset($fruits[2]); // удалить элемент массива по ключу (если задан) или индексу

var_dump($fruits);

/**
 * ПРОВЕРКА НА КОНЕЦ МАССИВА
 */
!next($array);// если нет следующего элемента то это конец массива

/**
 * ПОЛУЧИТЬ ТЕКУЩИЙ ЭЛЕМЕНТ МАССИВА
 */
current($array);// получить текущий элемент массива
next($array);// перевод указателя на следующий элемент
current($array);// получить слудующий элемент массива

/**
 * ПОЛУЧИТЬ КЛЮЧ ТЕКУЩЕГО ЭЛЕМЕНТА В МАССИВЕ
 */
key($array);// ключ текущего элемента массива
next($array);// перевод указателя на следующий элемент
key($array);// получение следующего ключа

/**
 * УЗНАТЬ ЕСТЬ ЛИ В МАССИВЕ КЛЮЧ
 */
array_key_exists(mixed($key), $array);// ОТДАСТ TRUE или FALSE в зависимости от того есть ли такой КЛЮЧ в массиве

/**
 * ПРОВЕРКА СУЩЕСТВОВАНИЯ ЭЛЕМЕНТА В МАССИВЕ С КОНКРЕТНЫМ ЗНАЧЕНИЕМ
 */
in_array(mixed($value), $array);// ОТДАСТ TRUE или FALSE в зависимости от того есть ли такое ЗНАЧЕНИЕ в массиве

// ПОЛУЧИТЬ КЛЮЧ ИСКОМОГО ЗНАЧЕНИЯ ЭЛЕМЕНТА В МАССИВЕ

/**
 * УДАЛИТЬ ЭЛЕМЕНТ МАССИВА
 */
unset($var['Example']);
array_search(mixed($value), $array);// ОТДАСТ КЛЮЧ если такое ЗНАЧЕНИЕ есть в массиве

/**
 * ВЫВОД МАССИВА В СТРОКУ ЧЕРЕЗ РАЗДЕЛИТЕЛЬ
 */
implode(', ', $array);

/**
 * СОРТИРОВКА ЗНАЧЕНИЙ МАССИВА
 */
sort($array);// сортирует значения элементов по алфавиту и возрастанию чисел, при этом сбрасывает ключи на индексы если это ассоциативный массив
rsort($array);// реверсивная сортировка

/**
 * СОРТИРОВКА ЗНАЧЕНИЙ АССОЦИАТИВНОГО МАССИВА
 */
asort($assoc_array);// сортирует значения массива по алфавиту и возрастанию цифр, при этом НЕ СБРАСЫВАЕТ ключи ассоциативного массива
arsort($assoc_array);// реверсивная сортировка

/**
 * СОРТИРОВКА ПО КЛЮЧАМ МАССИВА
 */
ksort($assoc_array);// сортирует ключи массива по алфавиту и возрастанию цифр
krsort($assoc_array);// реверсивная сортировка

/**
 * ОБЪЕДИНЕНИЕ МАССИВОВ array_merge();
 */
$array1 = [
    'login' => 'admin',
    'password' => '123'
];
$array2 = [
    'password' => '321'
];
var_dump(array_merge($array1, $array2));
//'login' => string 'admin' (length=5)
//'password' => string '321' (length=3)
//Это может быть удобно, когда нам необходимо обновить часть каких-то данных в массиве.
//Как в примере выше – мы обновили пароль, оставив логин прежним.