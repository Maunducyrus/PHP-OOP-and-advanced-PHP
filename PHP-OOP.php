<?php
class Fruit {
    // properties
    public $name;
    public $color;

    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
// setting color method
    function set_color($color) {
        $this->color = $color;
    }
    function get_color() {
        return $this->color;
    }
}

$apple = new Fruit();
$banana = new Fruit();
$apple->set_name('Apple');
$banana->set_name('Banana');

echo $apple->get_name();
echo "-";
$apple->set_color('red');
echo $apple->get_color();
echo "<>";
echo $banana->get_name(); 
echo "-";
$apple->set_color('yellow');
echo $apple->get_color() . "<br>";
?>



PHP - The__construct Function

<?php
class Fruits {
    public $name;
    public $color;

    function __construct($name) {
        $this->name = $name;
    }
function get_name() {
    return $this->name;
}
}

$apple = new Fruit("Apple");
echo $apple->get_name() ."<br>";
?>


PHP - The __destruct Function <br>
<?php

class Pet {
    public $name;
    public $color;

    function __construct($name) {
        $this->name = $name;
    }
    function __destruct() {
        // echo "The pet is {$this->name}." ;
    }
} 

$cat = new Pet("Cat");
?>


PHP OOP - Access Modifiers
<?php

class Pets {
    public $name;
     public $color;
    public $origin;


    function set_name($n) {
        // a public funtion (default)
        $this->name = $n;
    }

    function set_color($n) {
        // a protected funtion
        $this->color = $n;
    }

//     function set_name($n) {
// // a private function
//         $this->origin = $n;
//     }
}

$puppy = new Pets();
$puppy->set_name('puppy');//OK
$puppy->set_color('brown');//ERROR
// $puppy->set_origin('Holand');//ERROR

?>

PHP - What is Inheritance? <br>
<?php
class Vehicle {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The vehicle is {$this->name} and the color is {$this->color}." . "<br>";
    }
}
?>

PHP - Class Constants <br>

<?php
// class Goodbye {
//     const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
// }

// echo Goodbye::LEAVING_MESSAGE;
?> 


we can access a constant from inside the class 
by using the self keyword followed by the scope resolution operator (::) 
followed by the constant name. <br>

<?php

class Goodbye {
    const LEAVING_MESSAGE = "Thank you for paying me a visit";
    public function byebye() {
        echo self::LEAVING_MESSAGE;
    }
}

$goodbye = new Goodbye();
$goodbye->byebye();
echo "<br>";
echo "<br>";

?>

PHP - What are Abstract Classes and Methods ? <br>
<?php

//parent class
abstract class Car {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
    abstract public function intro() : string;
}

//child classes
class Audi extends Car {
    public function intro() : string {
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car {
    public function intro() : string {
      return "Proud to be Swedish I am a $this->name!";
    }
  }

  class Citroen extends Car {
    public function intro() : string {
        return "French extravangance! I'm a $this->name";
    }
  }

  //Create objects from the child classes
  $audi = new audi("Audi");
  echo $audi->intro();
  echo "<br>";

  $volvo = new volvo("Volvo");
  echo $volvo->intro();
  echo "<br>";

  $citroen = new citroen("Citroen");
  echo $citroen->intro();
?>

PHP - More Abstract Class Examples <br>

<?php
abstract class ParentClass {
    //Abstract method with an argument
abstract protected function prefixName($name);
}

class ChildClass extends ParentClass {

    public function prefixName($name) {
    if ($name == "John Doe") {
        $prefix = "Mr .";
    } else {
        $prefix = "Mrs";
    }
    return "{$prefix} {$name}";
    }
    
}
$class = new ChildClass;
echo $class->prefixName("John Doe");
echo "<br>";
echo $class->prefixName("Jane Doe");
echo "<br>";
?>

Using Interface <br>

<?php
// interface Animal {
//     public function makeSound();
// }

// class Cat implements Animal {
//     public function makeSound() {
//         echo "Meow";
//     }
// }

// $animal = new Cat();
// $animal->makeSound();
?>

<?php
Interface Animal {
    public function makeSound();
}
//Class definitions
class Cat implements Animal {
    public function makeSound() {
        echo "Meow" . "<br>";
    } 
}

class Dog implements Animal {
    public function makeSound() {
        echo "bark" . "<br>";
        }
}

class Mouse implements Animal {
    public function makeSound() {
        echo "Squeak" . "<br>";
        }
}

//create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);

//Tell the animals to make a sound
foreach($animals as $animal) {
    $animal->makeSound();
}
?>

OOP traits<br>

used to solve the problrm of inheritance 
to many classes <br>
<?php
trait message1 {
    public function msg1() {
        echo "OOP is fun";
    }
}

class Welcome {
    use message1;
}

$obj = new Welcome();
// $obj = msg1();
?>

PHP - Static Methods <br>

<?php
class ClassName {
    public static function staticMethod() {
        echo "lecturer Cyrus" . "<br>";
    
    }
}

//call static method
ClassName::staticMethod();
?>

PHP Namespaces <br>
- They allow for better organization by 
grouping classes that work together to perform a task <br>
- They allow the same name to be used for more than one class <br>

<?php
// namespace Html;

class Table {
    public $title = "";
    public $numRows = 0;
    public function message() {
        echo "<p>Table '{$this->title}' has {$this->numRows} rows. </p>";
    }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
                $table->message();

        ?>
    </body>
</html>

PHP - iterables<br>

<?php
// function printIterable(iterable $myIterable) {
//     foreach($myIterable as $item) {
//         echo $item;
//     }
// }

$arr = ["a", "b", "c"];
printIterable($arr);
?>

Implement the Iterator interface and use it as an iterable:<br>

<?php
//Create an Iterator
class MyIterator implements Iterator {
    private $items = [];
    private $pointer = 0;

    public function __construct ($items) {
        //array_values() makes sure that the keys are numbers
        $this->items = array_values($items);
    }

    public function current() {
        return $this->items[$this->pointer];
    }
    public function key() {
        return $this->pointer;
    }
    public function next() {
        $this->pointer++;
    }
    public function rewind() {
        $this->pointer = 0;
    }
    public function valid() {
        //count() indicates how many items are in the list
        return $this->pointer < count($this->items);
    }
}

//A function that uses iterables 
function printIterable(iterable $myIterable) {
    foreach($myIterable as $item) {
        echo $item;
    }
}

//Use the iterator as an iterable
$iterator = new MyIterator(["a", "b", "c", "d"]);
printIterable($iterator);
?>