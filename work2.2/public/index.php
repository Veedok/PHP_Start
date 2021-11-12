<?php
// 1. Создать структуру классов ведения товарной номенклатуры.
// а) Есть абстрактный товар.
// б) Есть цифровой товар, штучный физический товар и товар на вес.
// в) У каждого есть метод подсчета финальной стоимости.
// г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
// д) Что можно вынести в абстрактный класс, наследование?

//Логика программы в том что возьмем к примеру абстрактную крупу (гречка,манка,пшено и т.д)
// в магазине цена одной пачки будет по одной цене объекта PieceGoods
// в интернете та же пачка будет стоить в два раза меньше цена InternetProduct
// на развес цена будеть варьироватся в зависемости от кол-ва цена WeightGoods
// такая логика позволяет нам от абстрактного класса наследовать только штучный товар а от него наследовать уже все остальные
// Пытался сделать так как будто все 3 товара независемы и наследуются от Product но тогда возникает 1 вопрос и одна несостыковка 
//1) Зачем нам строка г) где приводится зависемости цен друг от друга
//2) При создании каждого класса можно ошибится в зависемости цен, а при наследовании и зависемости цен нам нужна всего 1 переменная цены от которой будут зависеть все 3 обьекта


// а) Создаем абстрактный класс продукт (решил создавать класс т.к. у каждого товара есть цена и ее тоже наследуют от абстрактного класса)
abstract class Product {
    public $prise;
    abstract public function get_price($quantity);
}
// Сначала создаем штучный товар т.к. у него постоянная цена а у его интернет клона цена в 2 раза ниже что позволит нам интернет продукт наследовать от этого класса изменив его структуру
// так же хотел отметить что в дальнейшем цену можно делать не фиксированой а брать из ввода админа или из БД
class PieceGoods extends Product {
    public $text;
    public function __construct()
    {
        $this->prise = 10; 
        $this->text = 'Стоимость составит: ';       
    }
    public function get_price($quantity)
        {
            echo($this->text . $this->prise * $quantity);
        }
}
// Создаем цифровой товар т.к. у него цена в 2 раза ниже его штучного анналога.В итоге запускаем контструктор родителя и потом его уменьшаем в двое
// т.к. метод подсчета финальной стоимости не отличается от родительского (у нас отличие только в цене которая ниже в 2 раза)
// то можем его не реализовывать а при вызове будем обращатся к родительскому но с заниженной ценой
class InternetProduct extends PieceGoods {
    public function __construct()
    {
        parent::__construct();
        $this->prise = $this->prise/2;
    }
}
// Представим что у нас маржа 35% не кто не будет работать в 0, исходя из этого максимальную скидку что мы можем дать это 30% 
// первый порог скидки начинается от 10кг поэтому если кол-во меньше 10кг то вызываем функцию родителя
// дальше идет система скидок до 100кг, при закупке в 100 и выше кг можем дать максимально возможную скидку

class WeightGoods extends PieceGoods {
    public function get_price($quantity)
    {
        if ($quantity < 10){
           parent::get_price($quantity);
        } elseif ($quantity >= 10 && $quantity < 20) {
            echo($this->text . ($this->prise * 0.9) * $quantity);
        } elseif ($quantity >= 20 && $quantity < 50) {
            echo($this->text . ($this->prise * 0.8) * $quantity);
        } elseif ($quantity >= 50 && $quantity < 100) {
            echo($this->text . ($this->prise * 0.75) * $quantity);
        } else {
            echo($this->text . ($this->prise * 0.7) * $quantity);
        }
    }
    
}

// 7. *Реализовать паттерн Singleton при помощи traits.
// Это задание давольно подробно разобрали на уроке тут оставалось лишь вынести немного кода в trait
trait MyHomeWork {
    static protected $number;
    public static function newSingleton() : C {
        if(self::$number === null){
            self::$number = new self();
        }
        return self::$number;
    }
}
class C {   
    private $text;
    private function __construct() {
        $this->text = "Все получилось";
        echo ($this->text);
    }
    use MyHomeWork;
}


$PieceGoodsObjekt = new PieceGoods;
$InternetProductObjekt = new InternetProduct;
$WeightGoodsObjekt = new WeightGoods;
var_dump($PieceGoodsObjekt);
echo('<br>');
var_dump($InternetProductObjekt);
echo('<br>');
var_dump($WeightGoodsObjekt);
echo('<br>');
$PieceGoodsObjekt->get_price(10);
echo('<br>');
$InternetProductObjekt->get_price(10);
echo('<br>');
$WeightGoodsObjekt->get_price(10);
echo('<br>');
$task7 = C::newSingleton();
echo('<br>');
