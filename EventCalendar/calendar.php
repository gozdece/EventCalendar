<?php 
class Calendar{

	private $buyil;
	private $buay;
	private $bugun;
	private $html;
	private $tarih = array();
	private $aylar =[1=>"Ocak",2=>"Şubat",3=>"Mart",4=>"Nisan",5=>"Mayıs",6=>"Haziran",7=>"Temmuz",8=>"Ağustos",9=>"Eylül",10=>"Ekim",11=>"Kasım",12=>"Aralık"];
	

	//once tarih verilmemişse suanki tarihi seçili olarak al.
	function __construct(){

		$sonuc = $this->tariheBak();
	}

	
	//Array olarak ay ve yıl bilgisi döndürür.
	function tariheBak(){
		if (isset($_GET["ay"]) && isset($_GET['yil'])) {
			$this->buay = $_GET["ay"];
			$this->buyil = $_GET["yil"];
		}else{
			$this->buay = date('n');
			$this->buyil = date('o');
		}

		$tarih[0]=$this->buay;
		$tarih[1]=$this->buyil;

		return $tarih;
	}

	//Ay ve yil adını baslık olarak yazılsın
	function tarihYaz(){
		$tarih = $this->tariheBak();
		$mevsim = $this->mevsimeBak($tarih);
		$html = '<div class="takvim">';
		$html.= '<div class="header'.$mevsim.'">';
		$html.='<div class="ay-yil">';
		$html.=$this->oncekiTarihGetir($tarih);
		$html.=$this->aylar[$tarih[0]]." ";
		$html.= date('Y',strtotime($tarih[1].'-'.$tarih[0].'-1'));
		$html.=$this->sonrakiTarihGetir($tarih);
		$html.='</div>';
		$html.='</div>';
		
		return $html;
	}

	function gunleriGetir($sonuc){

		$html ='';
		$tarih = $this->tariheBak();
		$ilkGun = date('N',strtotime($tarih[1].'-'.$tarih[0].'-01'));
		$toplam = date('t',strtotime($tarih[1].'-'.$tarih[0].'-01'));
		$sonGun = date('N',strtotime($tarih[1].'-'.$tarih[0].'-'.$toplam));
		$haftaSayisi = $this->haftaSayisi();
		$kutuNum = (($haftaSayisi-1)*7)+7;
		$a = $ilkGun-1;

		for ($i=1; $i <=$kutuNum ; $i++) { 
			$html.='<div class="sayi">';
			$html.='<span>';
				if ($ilkGun == $i) {
					$this->bugun=1;
				}
				if(($this->bugun!=0) && $this->bugun<=$toplam){
				
				$tarih = date('Y-m-d',strtotime($tarih[1].'-'.$tarih[0].'-'.($this->bugun)));
				$this->deger = $this->bugun;
             	$this->bugun++; 
             	$html.=$this->deger;
				}else{
					$html.="";
				}
			$html.='</span>';

			foreach ($sonuc as $event) {
				$eventBaslangic = $event[3];
  				$eventBitis = $event[4];
  				$gunDeger = date('j',strtotime($eventBaslangic));
  				$gunDegerBitis = date('j',strtotime($eventBitis));
  				$eventAd = $event[1];
  				$eventDesc = $event[2];
  				if(($gunDeger<=($i-$a))&& (($i-$a)<=$gunDegerBitis)){
                	$html.="<button class=\"event_red\" onclick=\"renkDegistir('$eventAd','$eventDesc','$eventBitis','$eventBaslangic')\">";
                	$html.=$event[1];
                	$html.='</button>';

            	}
			}

			
			$html.='</div>';
			
			}
		
		return $html;

	}

	function haftaSayisi(){

		$tarih = $this->tariheBak();
			
			$toplamGun = date('t',strtotime($tarih[1].'-'.$tarih[0].'-01'));

			$haftaSayisi = ($toplamGun%7==0?0:1) + intval($toplamGun/7);
         
        	$sonGun= date('N',strtotime($tarih[1].'-'.$tarih[0].'-'.$toplamGun));
         
        	$ilkGun = date('N',strtotime($tarih[1].'-'.$tarih[0].'-01'));
         
        	if($sonGun<$ilkGun){
             
            	$haftaSayisi++;
         
        	}
         
        		return $haftaSayisi;
			
	}

	function oncekiTarihGetir($tarih){
		$html = '';

		if ($tarih[0]==1) {

			$tarih[1]=$tarih[1]-1;
			$tarih[0]=13;

		}

		$html.='<a href="?ay='.($tarih[0]-1).'&&yil='.$tarih[1].'" class="previous round">&#8249;</a>';
		return $html;

	}

	function sonrakiTarihGetir($tarih){

		$html = '';

		if ($tarih[0]>=12) {

			$tarih[1]=$tarih[1]+1;
			$tarih[0]=0;

		}

		$html.='<a href="?ay='.($tarih[0]+1).'&&yil='.$tarih[1].'" class="next round">&#8250;</a>';
		return $html;
	}

	function mevsimeBak($tarih){
		$mevsim="";
		if ($tarih[0]==12 || $tarih[0]==1 || $tarih[0]==2) {
			$mevsim="kis";
		}elseif($tarih[0]==3 || $tarih[0]==4 || $tarih[0]==5){
			$mevsim="ilkbahar";
		}elseif($tarih[0]==6 || $tarih[0]==7 || $tarih[0]==8){
			$mevsim="yaz";
		}else{
			$mevsim="sonbahar";
		}
		return $mevsim;
	}
	
		
	
} 
?>
