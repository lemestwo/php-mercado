<?php

namespace tests;

use App\Core\Database;
use App\Models\Tax;
use PHPUnit\Framework\TestCase;

class TaxesTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        pg_query(Database::getConnection(), 'truncate table products restart identity cascade;');
        pg_query(Database::getConnection(), 'truncate table taxes restart identity cascade;');
    }


    public function testCanInsertTax()
    {
        Tax::create('teste', 1);
        $product = Tax::find(1);
        $this->assertEquals('teste', $product['name']);
        $this->assertEquals(0.01, $product['percent']);
    }

    public function testCanDeleteTax()
    {
        $this->assertEquals(true, Tax::delete(1));
    }
}