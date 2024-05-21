<?php
class Product {
    private $id;
    private $name;
    private $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}

class ProductManager {
    private array $products ;

    public function addProduct($products) {
        $this->products = $products;
    }

    public function ShowProduct($id) {
        foreach ($this->products as $product) {
            if ($product->getId() == $id) {
                echo "Product ID: " . $product->getId() . "\n";
                echo "Product Name: " . $product->getName() . "\n";
                echo "Product Price: $" . $product->getPrice() . "\n";
                return;
            }
        }
        echo "Product with ID $id not found.\n";
    }

    public function UpdateProduct($id, $name, $price) {
        foreach ($this->products as $product) {
            if ($product->getId() == $id) {
                $product->setName($name);
                $product->setPrice($price);
                echo "Product with ID $id has been updated.\n";
                return;
            }
        }
        echo "Product with ID $id not found.\n";
    }

    public function deleteProduct($id){
        foreach ($this->products as $product){
            if($product->getId()== $id){
                $found = array_search($product, $this->products);
                array_splice($this->products,$found,1);
            }
        }
    }
}

$product1 = new Product(1, "Product 1", 100);
$product2 = new Product(2, "Product 2", 200);
$product3 = new Product(3, "Product 3", 300);
$products = [$product1, $product2, $product3];
$productsManager = new ProductManager($products);
$productsManager->ShowProduct(1);
$productsManager->UpdateProduct(1, "Product 1 Updated", 150);
$productsManager->deleteProduct(2);
// the result should be:
// Product ID: 1
// Product Name: Product 1
// Product Price: $100
// Product with ID 1 has been updated.
// Product with ID 2 has been deleted.
?>
