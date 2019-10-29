<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="UTF-8">
</head>
<body>
  <div id="divRadios">
	   <input name="rdAguasclaientes" type="radio" value="Aguascalientes">
	    Aguascalientes
	   <input name="rdAguasclaientes" type="radio" value="Calvillo">
	    Calvillo
	   <input name="rdAguasclaientes" type="radio" value="Jesús Maria">
	    Jesús Maria
	   <input name="rdAguasclaientes" type="radio" value="Rincón de Romos">
	    Rincón de Romos
  </div>
  <div id="divRadios">
	   <input name="rdAguasclaientes" type="radio" value="Aguascalientes">
	    Aguascalientes
	   <input name="rdAguasclaientes" type="radio" value="Calvillo">
	    Calvillo
	   <input name="rdAguasclaientes" type="radio" value="Jesús Maria">
	    Jesús Maria
	   <input name="rdAguasclaientes" type="radio" value="Rincón de Romos">
	    Rincón de Romos
  </div>
  <button id="btnValidar">Validar</button>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$("#btnValidar").click(function(event) {
  if(!$("#divRadios input[name='rdAguasclaientes']").is(':checked')){
  	alert('Favor de seleccionar una opción');
  }
});
</script>
</body>
</html>