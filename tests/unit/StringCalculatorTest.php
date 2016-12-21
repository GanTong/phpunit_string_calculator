<?php

use App\StringCalculator;

class StringCalculatorTest extends PHPUnit_Framework_TestCase 

{


	/** @test */

	function it_translates_an_empty_string_into_zero()
	{

		$test1 = new StringCalculator();

		$this->assertEquals(0, $test1->add(''));

	}


		/** @test */

	function it_finds_the_sum_of_one_number()
	{

		$test2 = new StringCalculator(5);

		$this->assertEquals(5, $test2->add(5));

	}


			/** @test */

	function it_finds_the_sum_of_two_numbers()
	{

		$test3 = new StringCalculator('1,2');

		$this->assertEquals(3, $test3->add('1,2'));

	}


				/** @test */

	function it_finds_the_sum_of_any_amount_of_numbers()
	{

		$test4 = new StringCalculator('1,2,3,4,5');

		$this->assertEquals(15, $test4->add('1,2,3,4,5'));

	}


	 /** @test 
    * @expectedException InvalidArgumentException
     */

	function it_disallows_negative_numbers()
	{


		$test5 = new StringCalculator('-3,2');

		$this->assertEquals($this->fail('Negative Number -2 is not Allowed!!'), $test5->add('3,-2'));

		//$this->assertEquals($this->expectException(InvalidArgumentException::class), $test5->add('3,-2'));

	}


				/** @test */

	function it_ignores_any_number_that_is_one_thousand_or_greater()
	{

		$test6 = new StringCalculator('2,2,1000');

		$this->assertEquals(4, $test6->add('2,2,1000'));

	}


				/** @test */

	function it_allows_for_new_line_delimiters()
	{

		$test7 = new StringCalculator('2,2\n2');

		$this->assertEquals(6, $test7->add('2,2\n2'));

	}


				/** @test */

	function it_ignores_any_spaces_altogether()
	{

		$test8 = new StringCalculator('2,2,  2');

		$this->assertEquals(6, $test8->add('2,2,  2'));

	}


}

