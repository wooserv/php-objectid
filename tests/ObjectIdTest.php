<?php

use PHPUnit\Framework\TestCase;
use WooServ\ObjectId\ObjectId;

class ObjectIdTest extends TestCase
{
    public function test_it_generates_valid_objectid()
    {
        $id = ObjectId::generate();

        $this->assertIsString($id);
        $this->assertEquals(24, strlen($id));
        $this->assertMatchesRegularExpression('/^[a-f0-9]{24}$/i', $id);
    }

    public function test_timestamp_can_be_extracted()
    {
        $id = ObjectId::generate();
        $time = ObjectId::getTimestamp($id);

        $this->assertIsInt($time);
        $this->assertLessThanOrEqual(time(), $time);
    }

    public function test_it_generates_unique_ids()
    {
        $ids = [];
        for ($i = 0; $i < 1000; $i++) {
            $id = ObjectId::generate();
            $this->assertNotContains($id, $ids);
            $ids[] = $id;
        }
    }
}
