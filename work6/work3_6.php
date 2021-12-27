<?php
// Задание №1
class Board implements \SplSubject
{
    /**
     * @var int 
     */
    public $state;

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    public function __construct()
    {

        $this->observers = new \SplObjectStorage();
    }
    public function setState(){
        $this->state = 3;
        $this->notify();
    }
    public function attach(\SplObserver $observer) : void
    {
        $this->observers->attach($observer);
    }
    public function detach(\SplObserver $observer) : void
    {
        $this->observers->detach($observer);
    }
    public function notify() : void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}


class Vacancy implements \SplObserver
{
    public $name;
    public $vacancy;
    public function update(\SplSubject $board) : void
    {
        if ($board->state > 1) {
            echo "Разослать письмо";
            echo "<br>";
        }
        
    }
}

$board = new Board;
$mynewVacancy = new Vacancy();
$board->attach($mynewVacancy);
$board->setState();

// Задание №2

class Pay {
    private $strategy;
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }
    public function serStrategy(Strategy $strategy){
        $this->strategy = $strategy;
    }
    public function doSomeBusinessLogic() : void
    {
        $this->strategy->doAlgorithm();
    }

}
interface Strategy
{
    public function doAlgorithm();
}


class PayQiwi implements Strategy
{
    public function doAlgorithm() 
    {
        echo "Реализация оплаты Qiwi";
        echo "<br>";
    }
}
class PayYandex implements Strategy
{
    public function doAlgorithm()
    {
        echo "Реализация оплаты Yandex";
        echo "<br>";
    }
}
class PayWebMoney implements Strategy
{
    public function doAlgorithm()
    {
        echo "Реализация оплаты WebMoney";
        echo "<br>";
    }
}
$context = new Pay(new PayQiwi());
$context1 = new Pay(new PayYandex());
$context2 = new Pay(new PayWebMoney());
$context->doSomeBusinessLogic();
$context1->doSomeBusinessLogic();
$context2->doSomeBusinessLogic();


// Задание №3
interface Command
{
    public function execute() : void;
}

class Сopy implements Command
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function execute() : void
    {

        echo "Логика команды копирования которая в конструктор принимет обьект(Логика выризания будет очень похожа с копированием поэтому только с удалением обьекта с места откуда он берется)(" . $this->payload . ")\n";
        echo "<br>";
    }
}

class Insert implements Command
{
    /**
     * @var Receiver
     */
    private $receiver;

    private $a;

    private $b;

    public function __construct(Receiver $receiver, $a, $b)
    {

        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }
    public function execute() : void
    {
        echo "Логика вставки которая содержит вставляемый обьект + координаты вставки\n" . $this->a , $this->b;
    }
}
class Receiver
{
    public function doSomething(string $a) : void
    {

        echo "Receiver: Working on (" . $a . ".)\n";
    }

    public function doSomethingElse(string $b) : void
    {

        echo "Receiver: Also working on (" . $b . ".)\n";
    }
}
class Invoker
{
    /**
     * @var Command
     */
    private $onStart;

    /**
     * @var Command
     */
    private $onFinish;

    public function setOnStart(Command $command) : void
    {

        $this->onStart = $command;
    }

    public function setOnFinish(Command $command) : void
    {

        $this->onFinish = $command;
    }
    public function doSomethingImportant() : void
    {
        if ($this->onStart instanceof Command) {
            $this->onStart->execute();
        }
        if ($this->onFinish instanceof Command) {
            $this->onFinish->execute();
        }
    }
}
$invoker = new Invoker();
$invoker->setOnStart(new Сopy("Обьект"));
$receiver = new Receiver();
$invoker->setOnFinish(new Insert($receiver, " Координата а", " Координата в"));

$invoker->doSomethingImportant();

