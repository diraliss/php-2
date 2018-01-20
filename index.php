<?php

class product
{
    private $id; //свойство хранящее рандомно генерируемого id
    public $title; //свойство хранящее название
    public $description; //свойство хранящее название
    public $price; //свойство хранящее цену

    /*
     * Конструктор класса product инициализирует все видимые поля, id генерируется автоматически
     * */
    function __construct($title, $description, $price)
    {
        $this->id = rand(0, 99999);
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}

class viewProduct extends product
{
    private $active = false; //свойство хранящее отображение продукта

    /*
     * Возвращает данные о товаре в формате для отображения
     * */
    function getView()
    {
        if ($this->active) {
            return "<p><b>" . $this->title . "</b></p><p>" . $this->description . " Цена товара: " . $this->price . "</p>";
        }
        return "";
    }

    /*
     * Делает товар невидимым
     * */
    function disable()
    {
        $this->active = false;
    }

    /*
     * Делает товар видимым
     * */
    function enable()
    {
        $this->active = true;
    }

    /*
     * Конструктор класса viewProduct инициализирует недостающее значение
     * */
    function __construct($title, $description, $price, $active = false)
    {
        $this->active = $active;
        parent::__construct($title, $description, $price);
    }


    /*
     * Метод создающий экземпляр текущего класса из родителя
     * */
    /**
     * @param product $product
     * @return viewProduct
     */
    static function convert($product)
    {
        return new viewProduct($product->title, $product->description, $product->price);
    }
}

$product = new product("Картошка", "Урожай 2017", 20);
$viewProduct = viewProduct::convert($product);
$viewProduct->enable();
$viewProduct1 = new viewProduct("Тыква", "Урожай осень 2017", 30, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lesson 1</title>
</head>
<body>
<?php echo $viewProduct->getView() ?>
<?php echo $viewProduct1->getView() ?>
</body>
</html>





