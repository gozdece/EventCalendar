<!DOCTYPE html>
<?php include 'calendar.php';
include 'database.php';
 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <p id="demo"></p>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2  id="modalheader" class="modalHeaderText">Modal Header</h2>
            </div>
            <div  class="modal-body">
                <p id="modalbody">Some text in the Modal Body</p>
            </div>
            <div class="modal-footer">
                <h3 id="ilkmodalfooter">Modal Footer</h3>
                <h3 id="sonmodalfooter">Modal Footer</h3>

               
            </div>
        </div>
    </div>

	<div class="content">
        <?php  
            $calendar = new Calendar();
            $tarih = $calendar->tariheBak();
            echo $calendar->tarihYaz();

            $db = new Database();
            $sonuc = $db->list($tarih[0],$tarih[1]);

            ?>
		
			<div class="gunler">
                <div class="gunun_adi">
                    Pazartesi
                </div>
                <div class="gunun_adi">
                    Salı
                </div>
                <div class="gunun_adi">
                    Çarşamba
                </div>
                <div class="gunun_adi">
                    Perşembe
                </div>
                <div class="gunun_adi">
                    Cuma
                </div>
                <div class="gunun_adi">
                    Cumartesi
                </div>
            
                <div class="gunun_adi">
                    Pazar
                </div>
                <?php  echo $calendar->gunleriGetir($sonuc); ?>
            	
                
            </div>
        </div>
        
    </div>

</body>
		
	</div>
</body>
</html>