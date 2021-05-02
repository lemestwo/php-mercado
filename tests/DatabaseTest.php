<?php

namespace tests;

use App\Core\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $this->assertNotFalse(Database::getConnection());
    }
}