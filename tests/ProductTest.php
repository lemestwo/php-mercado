<?php declare(strict_types=1);

namespace tests;

use App\Core\Database;
use App\Models\Product;
use App\Models\Tax;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        pg_query(Database::getConnection(), 'truncate table products restart identity cascade;');
        pg_query(Database::getConnection(), 'truncate table taxes restart identity cascade;');

    }

    public function testCanInsertProduct()
    {
        Tax::create('teste', 1);
        Product::create('teste', '1', '100');
        $product = Product::find(1);
        $this->assertEquals('teste', $product['name']);
        $this->assertEquals('1', $product['type']);
        $this->assertEquals('100', $product['price']);
    }

    public function testCanEditProduct()
    {
        Tax::create('teste 2', 1);
        Product::update('teste 2', '2', '102', 1);
        $product = Product::find(1);
        $this->assertEquals('teste 2', $product['name']);
        $this->assertEquals('2', $product['type']);
        $this->assertEquals('102', $product['price']);
    }

    public function testCanDeleteProduct()
    {
        $this->assertEquals(true, Product::delete(1));
    }
}