<?php

//classes que realizam a leitura da linha e separam em variaveis
require_once 'classes/salesman.php';
require_once 'classes/customer.php';
require_once 'classes/sales.php';

//listagem de arquivos do diretorio data/in
$files = glob('data/in/*.{dat}', GLOB_BRACE);

//inicio do processamento
foreach ($files as $file){
	//array de objetos declaradas por arquivo
	$sales    = [];
	$salesman = [];
	$customer = [];

	//variaveis de controle de calculos declaradas por arquivo
	$bestSale 	= false;
	$worstSalesman 	= false;
	$sumSalary	= (float)0;
	$fp = fopen($file, "r");
	while ($line = fgets($fp)){
		$line = str_replace(["\n", "\r", " "], "", $line);
		$id = explode(",", $line);
		switch($id[0]){
			case "001":
				$objSalesman = new Salesman($line);
				if (!isset($salesman[$objSalesman->getName()])){
					$salesman[$objSalesman->getName()] = $objSalesman;
					$sumSalary += $objSalesman->getSalary();
				}
			break;

			case "002":
				$objCustomer = new Customer($line);
				if (!isset($customer[$objCustomer->getCnpj()])){
					$customer[$objCustomer->getCnpj()] = $objCustomer;
				}
			break;

			case "003":
				$objSale = new Sale($line);
				$salesman[$objSale->getSalesman()]->sumSale($objSale->getTotal());
				if (!$bestSale){ // primeira venda
					$bestSale = $objSale;
				}else{ // !primeira venda
					if ($bestSale->getTotal() < $objSale->getTotal()){ //validação de maior valor
						$bestSale = $objSale;
					}
				}
			break;
		}
	}
	fclose($fp);

	$fw = fopen("data/out/".basename($file, ".dat").".done.dat", "w");
	fwrite($fw, "Qtd Clientes: ".count($customer)."\n");
	fwrite($fw, "Qtd Vendedores: ".count($salesman)."\n");
	fwrite($fw, "Media Salarial Vendedores: ". ($sumSalary / count($salesman))."\n");
	fwrite($fw, "Venda mais cara: ". $bestSale->getSaleId()."\n");
	fwrite($fw, "Pior vendedor (baseado em valor de vendas): ". worstSalesman($salesman)->getName()."\n");
	fclose($fw);
}

function worstSalesman($salesmanArray){
	$worst = false;
	foreach($salesmanArray as $objSalesman){
		if (!$worst){
			$worst = $objSalesman;		
		}else{
			if ($worst->getTotalSales() > $objSalesman->getTotalSales()){
				$worst = $objSalesman;
			}
		}
	}
	return $worst;
}
