<?php
// Задание 1 реализовать Decorator
interface send {
    public function mySendstring() : string;
}


class sendEmail implements send {
    public function mySendstring(): string
    {
        return "Тут реализация отправки эмейла";
    }
}


class Decorator implements send {

    /**
     * @var send
     */

     protected $send;
     public function __construct(send $send)
     {
         $this->send=$send;
     }
    public function mySendstring(): string
    {
        return $this->send->mySendstring();
    }
}

class EmailTelegramm extends Decorator {
    public function mySendstring() :string {
        return "Тут реализуем отправку в телеграмм и вызываем отпраку родителя эмейла " . parent::mySendstring() . ")";
    }
}

class SmsEmail extends Decorator {
    public function mySendstring() :string {
        return "Тут реализуем отправку sms и вызываем отпраку родителя эмейла " . parent::mySendstring() . ")";
    }
}

function clientCode(send $component)
{

    // ...

    echo "RESULT: " . $component->mySendstring();

    // ...
}

$simple = new sendEmail();

clientCode($simple);
echo "<br>";


$decorator1 = new EmailTelegramm($simple);
clientCode($decorator1);
echo "<br>";
$decorator2 = new SmsEmail($simple);
clientCode($decorator2);
echo "<br>";

// Задание 2 адаптер надеюсь я все правильно понял
class CircleAreaLib
{
   public function getCircleArea(float $diagonal)
   {
       $area = (M_PI * $diagonal**2)/4;

       return $area;
   }
}

class SquareAreaLib
{
   public function getSquareArea(int $diagonal)
   {
       $area = ($diagonal**2)/2;

       return $area;
   }
}


interface ISquare
{
function squareArea(int $sideSquare);
}

interface ICircle
{
function circleArea(int $circumference);
}

// Создаем константу числа Пи
define("P", 3.14);
class Circle implements ICircle {
    // в конструкторе создаем адаптируемый класс
    private $CircleAreaLib;
    public function __construct(CircleAreaLib $CircleAreaLib)
    {
        $this->CircleAreaLib = $CircleAreaLib;
    }
    // применяем интерфейс и в его реализации используем адаптируемый класс но классу отдаем длину окружности деленную на число Пи
    public function circleArea(int $circumference)
    {
       echo  $this->CircleAreaLib->getCircleArea($circumference/P);
       echo "<br>";
    }
}

class Square implements ISquare {
    // в конструкторе создаем адаптируемый класс
    private $SquareAreaLib;
    public function __construct(SquareAreaLib $SquareAreaLib)
    {
        $this->SquareAreaLib= $SquareAreaLib;
    }
    // применяем интерфейс и в его реализации используем адаптируемый класс но классу отдаем гипотенузу вместо катета
    public function squareArea(int $sideSquare){
       echo $this->SquareAreaLib->getSquareArea(hypot($sideSquare, $sideSquare));
       echo "<br>";
    }
}

// Тестировал сам себя
$newSquareAdaptt = new SquareAreaLib;
$newSquare = new Square($newSquareAdaptt);
$newSquare->squareArea(10);

$newCircleAdaptt = new CircleAreaLib;
$newCircle = new Circle($newCircleAdaptt);
$newCircle->circleArea(10);