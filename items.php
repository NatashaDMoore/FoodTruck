<?php
//items3.php


$myItem = new Item(1,"Fried Rice","Jasmine rice stir-fried in a flavorful garlic paste and eggs.",10.99);
$items[] = $myItem;

$myItem = new Item(2,"Drunken Noodles","Crispy thick rice noodle, onion, red bell pepper and basil. Stir fried in savory, sweet and spicy sauce.",11.99);
$items[] = $myItem;

$myItem = new Item(3,"Pad Thai","Stir Fried thin noodles with tamarind sauce, bean sprouts, eggs, tofu and topped with ground peanuts.",10.99);
$items[] = $myItem;


//create a counter to load the ids...
//$items[] = new Item(1,"Taco","Our Tacos are awesome!",4.95);
//$items[] = new Item(2,"Sundae","Our Sundaes are awesome!",3.95);
//$items[] = new Item(3,"Salad","Our Salads are awesome!",5.95);

// echo '<pre>';
// var_dump($items);
// echo '</pre>';


class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    
    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        
    }#end Item constructor

 
}#end Item class