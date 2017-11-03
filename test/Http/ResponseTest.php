<?php

namespace ASCII\Test\Http;

use ASCII\Http\Response;

class ResponseTest extends \PHPUnit\Framework\TestCase
{
	public function getResponse () {
		return $this->getMockBuilder(Response::class)
					->getMock();
	}
	
	
	public function testConstructor () {
		
		$this->assertTrue(true);
	}
	
	/**
	 * @dataProvider constructProvider
	 */
	public function testContruct ($prop, $val) {
		
		$class = new \ReflectionClass(Response::class);
		$prop= $class->getProperty($prop);
		$prop->setAccessible(true);
		$response = $class->newInstanceArgs([]);
		
		$this->assertTrue( $val=== $prop->getValue($response));
		
	}
	
	public function constructProvider () {
		return [
				["body", ""],
				["header", []],
				["reason", "OK"],
				["status", 200],
		];
	}
	
	public function statusProvider () {
		return [
				[null,null],
				[[],[]],
		];
	}
	
	/**
	 * @dataProvider statusProvider
	 * @expectedException \TypeError
	 */
	public function testSetStatus ($status, $reason) {
		
		$this->getResponse()->setStatus($status, $reason);
		
	}
	
}
