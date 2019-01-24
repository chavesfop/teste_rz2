<?php
class Sale {
	private $_saleId;
	private $_salesman;
	private $_total = 0;

	public function __construct($string){
		$stringNoSpaces = str_replace(' ', '', $string);
		$tmp = explode("[", $stringNoSpaces);
		$tmp2 = explode("]", $tmp[1]);
		$stringItens = $tmp2[0];
		$stringData = $tmp[0].$tmp2[1];
		$stringData = str_replace(",,", ",", $stringData);	
		$array = explode(',', $stringData);
		if ($array[0] != "003"){
			throw new Exception("Not a sale");
		}
		$this->_saleId = $array[1];
		$this->_salesman = $array[2];
		$strItens = $stringItens;
		$arrItens = explode (",", $strItens);
		foreach($arrItens as $strItem){
			$arrItem = explode("-", $strItem);
			$this->_total += ((float)$arrItem[1]*(float)$arrItem[2]);
		}
	}

	public function getTotal(){
		return $this->_total;
	}

	public function getSalesman(){
		return $this->_salesman;
	}

	public function getSaleId(){
		return $this->_saleId;
	}
}
