<?php

namespace UnknownRori\Tests;

use PHPUnit\Framework\TestCase;
use UnknownRori\EasyArray\EasyArray;

/**
 * @covers \UnknownRori\EasyArray\EasyArray::class
 */
class EasyArrayTest extends TestCase
{
    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_first_initialize_EasyArray_instance()
    {
        $EasyArray = new EasyArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

        $this->assertInstanceOf(\Unknownrori\EasyArray\EasyArray::class, $EasyArray);
    }

    /**
     * @Revs(1000)
     * @iterations(10)
     * @test
     */
    public function bench_second_initialize_EasyArray_instance()
    {
        $EasyArray = new EasyArray([
            "article" => "Lorem ipsum",
            "slug" => "Lorem",
            "timestamp" => date_timestamp_get(date_create()),
        ]);

        $this->assertInstanceOf(\Unknownrori\EasyArray\EasyArray::class, $EasyArray);
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_helper_function_test()
    {
        $EasyArray = EasyArr(1);

        $this->assertInstanceOf(\Unknownrori\EasyArray\EasyArray::class, $EasyArray);
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_first_push_data()
    {
        $data = [1, 2, 3];

        $EasyArray = new EasyArray($data);
        $EasyArray->push(4)->save();

        array_push($data, 4);

        $this->assertEquals($data, $EasyArray->get());
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_first_pop_data()
    {
        $data = [1, 2, 3, 4, 5, 6, 7, 8];

        $EasyArray = new EasyArray($data);
        $EasyArray->pop()->save();

        array_pop($data);

        $this->assertEquals($data, $EasyArray->get());
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_first_merge_data()
    {
        $data = [1, 2, 3];
        $data_target = [4, 5, 6];

        $EasyArray = new EasyArray($data);
        $EasyArray->merge($data_target)->save();

        $merge_result = array_merge($data, $data_target);

        $this->assertEquals($merge_result, $EasyArray->get());
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_first_fill()
    {
        $data = [
            "author" => "John",
            "title" => "Being John",
            "content" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem dolores beatae tempore temporibus iure accusamus ratione, sint assumenda magni? Repellendus quia placeat commodi maiores ipsum qui vero mollitia tempore a?"
        ];

        $fill_data = [
            "author" => "UnknownRori",
            "title" => "PHP 101",
            "timestam" => "04-07-2020"
        ];

        $expected_data = [
            "author" => "UnknownRori",
            "title" => "PHP 101",
            "content" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem dolores beatae tempore temporibus iure accusamus ratione, sint assumenda magni? Repellendus quia placeat commodi maiores ipsum qui vero mollitia tempore a?"
        ];

        $collect = new EasyArray($data);
        $collect->fill($fill_data);
        $collect->save();

        $this->assertEquals($expected_data, $collect->get());
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_check_key()
    {
        $data = [
            "author" => "John",
            "title" => "PHP 101"
        ];
        $collect = new EasyArray($data);

        $this->assertTrue($collect->exist('author'));
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_reverse()
    {
        $data = [
            "author" => "John",
            "title" => "PHP 101"
        ];
        $collect = new EasyArray($data);

        $this->assertEquals(array_reverse($data, true), $collect->reverse());
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_exist_array()
    {
        $find = [1, 2, 3];
        $data = [1, 2, 3, 4, 5];

        $collect = new EasyArray($data);

        $this->assertTrue($collect->exist($find));
    }

    /**
     * @test
     * @Revs(1000)
     * @iterations(10)
     */
    public function bench_exist_array_wrong()
    {
        $find = [1, 2, 3, 10];
        $data = [1, 2, 3, 4, 5];

        $collect = new EasyArray($data);

        $this->assertFalse($collect->exist($find));
    }
}
