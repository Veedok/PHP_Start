<?php
// Описываем водные басейны извините но в сторону маркетинга и интернет магазина уже задолбало думать. Как я понял главная цель дз понять как мы усвоили классы и наследование
class water {
    //У каждого водного обьекта есть имя,температура,возможно волны и обьем
    protected $name;
    public $temp;
    public $waves;
    public $size;
    //При создании оьекта надо указать его имя
    public function __construct($waterName)
    {
        $this->name = $waterName;
    }
    //функции на изменение всех трех параметров
    public function temp($newtemp) {
        $this->temp = $newtemp;
    }
    public function storm($waveHeight) {
        $this->waves = $waveHeight;
    }
    public function changeSize($newSize){
        $this->size = $newSize;
    }
}
//Первый наследник океан
class Ocean extends water {
    protected $salinity;
    public function __construct($waterName, $salinity)
    {   
        parent::__construct($waterName);
        $this->salinity = $salinity;
    }
}
//Второй наследник река
class river extends water {
   protected $width;
   public function __construct($waterName, $widh)
    {   
        parent::__construct($waterName);
        $this->width = $widh;
    }
}
//Классы отличаются тем что у океана соленая вода а у реки есть ее ширина
//Можно придумывать еще кучу функций и различий между классами и в их методах и описании но честно интернет магазин уже год делаем и на каждом курсе все с нуля хочеться небольшого разнообразия
$myOcean = new Ocean('bigOcean', 14);
$myRiver = new river('Днепр', '1,5км');
var_dump($myRiver);
echo("<br>");
var_dump ($myOcean);
echo("<br>");

//№5
//Выводим каждый раз значение на 1 больше т.к. static определяется 1 раз как и объясняли на уроке а потом просто увеличивается в независемости от того какой объект его вызвал
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
echo("<br>");
//№6
//Суть та же что и в предидущем примере просто у наследника своя функция foo а у родителя своя поэтому мы и видим вывод двух разных $x
class B {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class C extends B {
}
$a1 = new B();
$b1 = new C();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
echo("<br>");
//№7
//По отношению к задачи 6 ничего не изменилось гуглил и читал php.net и там нашел такое
//"В случае отсутствия аргументов в конструктор класса, круглые скобки после названия класса можно опустить."
//Так что в этой задачи нас просто пытаются запутать отсутствием круглых скобок
class D {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class F extends D {
}
$a1 = new D;
$b1 = new F;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 