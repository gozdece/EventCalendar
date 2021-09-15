

function renkDegistir(eventAd,eventDesc,eventBitis,eventBaslangic){

  	var eventAd = eventAd;
  	var eventDesc = eventDesc;
  	var eventBitis = eventBitis;
  	var eventBaslangic = eventBaslangic;
  	var modal = document.getElementById("myModal");
  	
  	modal.style.display = "block";

  	
  	var modalheader = document.getElementById("modalheader");
  	modalheader.innerHTML=eventAd;

  	var modalbody = document.getElementById("modalbody");
  	modalbody.innerHTML=eventDesc;

  	var ilkmodalfooter = document.getElementById("ilkmodalfooter");
  	ilkmodalfooter.innerHTML='Başlangıç Tarihi: '+eventBaslangic+'		/		Bitis Tarihi:'+eventBitis;

  	
}

function close(){
	var modal = document.getElementById("myModal");
	modal.style.display = "none";
}
window.onclick = function(event) {
	var modal = document.getElementById("myModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
