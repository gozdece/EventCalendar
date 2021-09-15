<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<style type="">
			.div{
				display: none;
			}
	</style>
</head>
<body>
	
	<?php 	$a=10; ?>
<div class="div" id="div">AA</div>
<button onclick="myFunction()">Gonder</button>
<div id="divan"></div>
<script type="">
		function myFunction(){
			var x = document.getElementById("div").innerText;
  			document.getElementById("divan").innerHTML = x;
		}
	</script>
</body>
</html>