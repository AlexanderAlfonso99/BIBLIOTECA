<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mostrar Usuario</title>
</head>
<body>

	<form action="mostrarusu.php" method="post" margin: auto background-color: #ededed>
		<h1>MOSTRAR USUARIOS</h1>
		<input type="radio" name="ordenusu" value="Sin orden" required="required"> Sin Orden 
		<input type="radio" name="ordenusu"value="Orden Descendente" required="required">Orden Descendente
		<input type="radio" name="ordenusu" value="Orden Ascendente" required="required">Orden Ascendente <br><br>
		<input type="submit" name="mostrarusu" value="Consultar Usuarios">
	</form>
</body>	
</html>