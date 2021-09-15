<?php
class Database extends PDO {

	public $event=array();
	function __construct() {

		define ("DB_HOST","localhost");
		define ("DB_NAME","event");
		define ("DB_USER","root");
		define ("DB_PASS","");

		parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
		
	}

	function list($simdikiAy,$simdikiYil) {
		
		$tamTarih = date('Y-m',strtotime($simdikiYil.'-'.$simdikiAy));
		$sorgum="select * from eventTable";
		$son=$this->prepare($sorgum);
		$son->execute();
		$sonuc = $son->fetchAll();

		foreach ($sonuc as $value) {
			$baslangic = date_create($value[3]);//baslangıc tarihini date türüne cevirdik.
			$baslangicTarih= date_format($baslangic, 'Y-m');
		
			if ($tamTarih == $baslangicTarih) {
				array_push($this->event, $value);
			}
		}
		return $this->event;
		/*
		for ($i=0; $i < count($sonuc); $i++) { 
			$baslangic = date_create($sonuc[$i][3]);//baslangıc tarihini date türüne cevirdik.
			$baslangicTarih= date_format($baslangic, 'Y-m');
		
			if ($tamTarih == $baslangicTarih) {
				echo "oldu";
			}else{
				echo "olmadı";
			}
		}
/*
		$baslangic = date_create($sonuc[0][3]);//baslangıc tarihini date türüne cevirdik.
		$baslangicTarih= date_format($baslangic, 'Y-m-d');
		$baslangicAy= date('n',strtotime($baslangicTarih));
		$baslangicYil = date('Y',strtotime($baslangicTarih));
		print_r($sonuc);
		
		if ($simdikiYil == $baslangicYil) {
			if($simdikiAy == $baslangicAy){
				return $sonuc;
			}else{
				echo"gelmedi1";
			}
		}else{
			echo "gelmedi2";
		}
		*/
			
	}
}
	
 ?>