<?php

// 자동차 클래스
class Car {
	protected $name = "";
	protected $comp = "";

	protected function move() {
		echo "전진!\n";
	}
	protected function stop() {
		echo "정지!\n";
	}
	public function auto() {
		echo $this->comp." ".$this->name." ";
		$this->move();
		$this->stop();
	}
}

class Kia extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "기아";
	}
}
class Toyota extends Car {
	public function __construct($name) {
		$this->name = $name;
		$this->comp = "토요타";
	}
}

$obj = new Kia("레이");
$obj->auto();

$obj2 = new Toyota("크라운");
$obj2->auto();

?>