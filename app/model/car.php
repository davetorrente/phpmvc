<?php
class car
{
	protected static $dataFile;
	protected $inventory = [];

	public function getCars()
	{
		$cars = [
			'cars' => [1,2,3,4,5]
		];
		return $cars;
	}
}