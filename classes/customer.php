<?php
class Customer {
	private $_cnpj;
	private $_name;
	private $_businessArea;

	public function __construct($string){
		$strNoSpaces = str_replace(" ", "", $string);
		$array = explode(',', $strNoSpaces);
		if ($array[0] != "002"){
			throw new Exception("Not a customer");
		}
		$this->_cnpj = $array[1];
		$this->_name = $array[2];
		$this->_businessArea = $array[3];
	}

	public function getCnpj(){
		return $this->_cnpj;
	}
}
