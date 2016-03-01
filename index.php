<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  </head>
  <body>

  	<p> Ucitaj podatke iz .csv datoteke u bazu</p>
  	<form method="POST" action="import.php">
  		<input type="submit" name="btnImport" value="Ucitaj CSV"/>
  	</form>

  	
  	<br>Pretrazi grad:<input type="search" id="city"/>
  	<button type="button" id="btnSub">Pretraga</button>
  	

  	<div id="content"></div>

  	<script>
  		$(document).ready(function(){
          $('#btnSub').on('click',function(){
          	$.get('select.php',{'q':$('#city').val()},function(data){
          		$("#content").html(data);
          	});
          });
        });
  	</script>

  </body>
</html>