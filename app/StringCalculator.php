<?php

/* Rules for String Calculator

- Implement a add method that accept a string of numbers, not integers.
- If you don't pass anything as input it will become zero.
- Accepts new line delimiters '\n'.
- If input > 1000, it will be ignored. 

*/


namespace App;

class StringCalculator {


	/**
	 * The maximum number that may be added.
	 */
	const MAX_NUMBER_ALLOWED = 1000;

	/**
	 * @param $numbers
	 * @return int
	 */



	public function add($numbers)

	{

		//$numbers = explode(',', $numbers);

		//return array_sum($numbers);

		$numbers = $this->parseNumbers($numbers);

		$numbers = array_map(function($number)

		{
	
				$this->guardAgainstInvalidNumber($number);

				if ($number >= self::MAX_NUMBER_ALLOWED) 

				{
					return 0;

				}

				return $number;
			

			}, $numbers);

		return array_sum($numbers);

	}

	/**
	* @param $number
	*/

	private function guardAgainstInvalidNumber($number)

		{

			if ($number < 0)
			{
			
			throw new InvalidArgumentException("Invalid number provided: {$number}");

			}

		}



	/**
	 * @param $numbers
	 * @return array
	 */

	private function parseNumbers($numbers)
	{
		return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
	}


}