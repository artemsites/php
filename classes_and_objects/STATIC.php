<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.10.18
 * Time: 10:57
 */
////////////////////////////////////////////////////////////////////////////////////////////////////
/***************************************** STATIC METHOD *****************************************/

/**
 * STATIC - это свойства и методы, которые принадлежат классу целиком, а не созданным объектам этого класса.
 * То есть использовать их можно даже без создания объектов. Иногда их называют просто свойствами и методами класса.
 */
class ExampleStatic
{
    public static function test(int $x)
    {
        return 'x = ' . $x;
    }
}

/**
 * Использовать мы их можем без создания объектов:
 *
 * :: - через двоеточие обращение к статическим методам класса.
 */
//echo ExampleStatic::test(5) . '<br>';

/**
 * Следующий пример:
 */
class ExampleStatic2
{
    private $role;

    private $name;

    public function __construct(string $role, string $name)
    {
        $this->role = $role;
        $this->name = $name;
    }

    /**
     * Можем сделать метод, который будет создавать администраторов, и ему на вход нужно будет только имя пользователя.
     * Этот метод возвращает новый объект текущего класса (благодаря слову self),
     * и передаёт ему всегда в аргумент $role значение ‘admin’.
     */
    public static function createAdmin(string $name)
    {
        return new self('admin', $name); // Создать новый объект(new) текущего класса (self)
        /**
         * Отличие от методов объектов.
         * В отличие от методов объектов, в статических методах нет слова $this –
         * оно указывает только на текущий объект. Если объекта нет – нет и $this!
         */
    }
}

/**
 * Чтобы создать администратора, нам нужно сделать следующее:
 */
$admin = new ExampleStatic2('admin', 'Иван');
//var_dump($admin);
/**
 * Или
 * Примененить STATIC метод ::createAdmin
 */
$admin = ExampleStatic2::createAdmin('Степа');
//var_dump($admin);

////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************** Статические свойства **************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
class ExampleStatic3
{
    public static $x;

    /**
     * self:: - при помощи слова мы сможем достучаться до этих свойств, даже внутри этих объектов.
     * Ну и конечно же, так как статические свойства принадлежат классу,
     * а не объектам, мы можем использовать их в статических методах.
     */
    public function getX()
    {
        return self::$x;
    }
}

/**
 * :: - через двоеточие обращение к статическим переменным класса.
 * Мы можем читать и писать в это свойство, не создавая объектов этого класса:
 */
ExampleStatic3::$x = 5;

//var_dump(ExampleStatic3::$x); // 5

/**
 * Кроме того, эти же свойства будут доступны и у объектов этого класса:
 */
$a = new ExampleStatic3();
//var_dump($a::$x); // 5

$b = new ExampleStatic3();
//var_dump($b->getX()); // 5

$c = new ExampleStatic3();
//var_dump($c::getX()); // 5

////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************* Применение статических свойств *********************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
class ExampleStatic4
{
    private static $count = 0;

    /**
     * Чтобы увеличивать счет каждый новый созданный объект добавим в конструктор
     * self::$count++
     */
    public function __construct()
    {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

//echo 'Людей уже ' . ExampleStatic4::getCount() . '<br>'; // 0
/**
 * Давайте проверим, что всё работает:
 */
$human1 = new ExampleStatic4();
$human2 = new ExampleStatic4();
$human3 = new ExampleStatic4();
//echo 'Людей уже ' . ExampleStatic4::getCount() . '<br>'; // 3