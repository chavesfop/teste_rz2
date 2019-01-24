<?php
class Salesman { 
	private $_cpf;
	private $_name;
	private $_salary;
	
	private $_totalSales = 0;
	
	public function __construct($string){
		$stringNoSpaces = str_replace(" ", "", $string);
		$array = explode(',', $stringNoSpaces);
		if ($array[0] != "001"){
			throw new Exception("Not a salesman");
		}
		$this->_cpf = $array[1];
		$this->_name = $array[2];
		$this->_salary = (float)$array[3];
	}
	
	public function getName(){ 
		return $this->_name;
	}

	public function getSalary(){
		return $this->_salary;
	}

	public function sumSale($val){
		$this->_totalSales += $val;
	}

	public function getTotalSales(){
		return $this->_totalSales;
	}
}
