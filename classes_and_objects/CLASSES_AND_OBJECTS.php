<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 12.09.18
 * Time: 8:59
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/**************************************** СОЗДАНИЕ КЛАССА: ****************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Шаблон для объектов
 */
class Cat
{
    /**
     * МОДИФИКАТОРЫ
     * Перед именем свойства всегда ставится модификатор доступа.
     *
     * PUBLIC
     * Доступны как внутри объектов класса, так и снаружи – можем напрямую обращаться к ним извне.
     * Доступны объектам классов-наследников.
     */
    public $name;
    /**
     * PRIVATE
     *
     * Доступны только внутри объектов этого класса, недоступны в объектах классов-наследников;
     */
    private $color;

    /**
     * ИНКАПСУЛЯЦИЯ
     *
     * То, что внутри объектов есть свойства - это уже проявление инкапсуляции.
     * У объекта есть свойства, он их внутри себя содержит - вот и "ин" "капсула".
     *
     * Модификаторы доступа - это ещё одно проявление инкапсуляции.
     *
     * Инкапсуляция - это возможность объектов содержать в себе свойства и методы.
     * Так мы делаем их зависимыми друг от друга внутри этой "капсулы".
     */
    private $weight;

    /**
     * КОНСТУРКТОР
     *
     * Обязательно вызывается автоматически при создании объекта класса, в котором он описан.
     * Метод-конструктор должен называться __construct. Именно так и никак иначе.
     */
    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    // Конструктор принято объявлять в начале класса, после объявления свойств, но перед другими методами.

    /**
     * МЕТОДЫ
     */
    public function sayHello()
    {
        /**
         * $THIS
         *
         * Внутри классов доступна специальная переменная $this->,
         * и она указывает на наш текущий созданный объект.
         * В отличии от self:: которая указывает на текущий класс.
         */
        echo 'Привет! Меня зовут ' . $this->name . '.';
        echo '<br>';
        echo 'Мой цвет ' . $this->color . ').';
        echo '<br>';
    }

    /**
     * СЕТТЕР
     *
     * Такие методы как setName(),
     * задающие значения свойствам объекта называются сеттерами.
     */
    /**
     * Явное определение типа аргумента в методе setName(string $name)
     */
    public function setName(string $name) // string чтобы color был описан строкой
    {
        $this->name = $name;
    }

    /**
     * ГЕТТЕР
     */
    /**
     * Возвращаемые значения для методов getColor(): string
     */
    public function getColor(): string // возвращяемое значение будет строкой
    {
        return $this->color;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/*************************************** СОЗДАНИЕ ОБЪЕКТА: ***************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************ ПРИМЕНЕНИЕ КОНСТРУТОРА: ************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * По классу (шаблону)
 *
 * Чтобы создать кота с именем Снежок мы должны передать аргумент при создании нового объекта:
 */
//$cat1 = new Cat('Снежок', 'Белый');
// $cat1 будет ссылкой на объект а не самим объектом!
// Только когда не будет не одной ссылки объект уничтожится из памяти.

/**
 * ИЗМЕНЕНИЕ СВОЙСТВА ОБЪЕКТА
 */
//$cat1->name = 'Барсик';
// После создания объекта можно и поменять публичные свойства.

/**
 * ВЫЗОВ МЕТОДА
 *
 * Для вызова метода объекта используется такой же оператор как и для доступа к свойствам объекта ->
 */
//$cat1->sayHello(); // 'Привет! Меня зовут Барсик.'

/**
 * ПРИМЕНЕНИЕ СЕТТЕРА
 */
//$cat1->setName('Пирожок');

/**
 * ПРИМЕНЕНИЕ ГЕТТЕРА
 */
//echo $cat1->getColor();

//var_dump($cat1);

////////////////////////////////////////////////////////////////////////////////////////////////////
/***************************************** НАСЛЕДОВАНИЕ: *****************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Пусть есть класс-родиель:
 */
class Post
{
    /**
     * PROTECTED
     *
     * Доступны внутри объектов этого класса и всем объектам классов-наследников.
     * При этом недоступны извне;
     */
    protected $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Возвращается пустота (void), то есть ничего сеттер не должен возвращать
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void // тоже самое
    {
        $this->text = $text;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************ ПРИМЕНЕНИЕ НАСЛЕДОВАНИЯ: ************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Lesson - класс-наследник
 * Ключевое слово "extends" (расширять)
 */
class Lesson extends Post // Lesson называют классом-наследником, или дочерним классом. Класс Post – родительский класс.
{
    private $homework; // здесь уже приватное свойство

    public function __construct(string $title, string $text, string $homework)
    {
        /**
         * PARENT:: ВЫЗОВ РОДИТЕЛЬСКОГО МЕТОДА
         *
         * К методам классов обращаются через ::
         */
        parent::__construct($title, $text);
        /**
         * В момент вызова конструктора класса Lesson (при создании нового объекта), сначала произойдёт вызов метода
         * __construct из родительского класса, а затем задастся свойство homework. При этом этот метод из родительского
         * класса отработает для свойств класса-наследника. Можно представить, что мы просто скопировали сюда содержимое
         * этого метода из класса Post и вставили его сюда. Именно так и происходит, когда этот код выполняется.
         */
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}

/**
 * В качестве родительского класса при помощи слова extends можно указать только один класс.
 * Однако, у класса Lesson, в свою очередь, тоже могут быть наследники.
 * Они унаследуют все свойства и методы всех своих родителей.
 * При этом доступными внутри объектов класса-наследника будут только свойства или методы, объявленные в родительском
 * классе как public или protected. Свойства и методы, с модификатором доступа private
 * не будут унаследованы дочерними классами.
 */

/**
 * При этом в объектах класса Lesson нам так же доступны все protected- и public-методы,
 * объявленные в родительском классе. Давайте убедимся, в этом.
 */
//$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
//echo 'Название урока: ' . $lesson->getTitle();

/**
 * НАСЛЕДНИК НАСЛЕДНИКА (внук:))
 */
class PaidLesson extends Lesson
{
    private $price;

    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************* INTERFACE *******************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
include_once 'INTERFACES.php';

////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************* TRAITS *********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
include_once 'TRAITS.php';