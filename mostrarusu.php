<?php 
	// require= llama el archivo conectar.php 

	require"conectar.php";
	
		
	// $ingresoperfil = variable para enviar sentencia SQL y buscar datos.
	// solo se envía nombre de usuario para buscar coincidencia 
	$ordenusu=$_POST['ordenusu'];
	
	if ($ordenusu=='Sin orden') {		               
	 	$mostrarusu = "SELECT * FROM  usuarios";
	 } elseif ($ordenusu=='Orden Ascendente') {
	 	$mostrarusu = "SELECT * FROM  usuarios order by NomUsuario ASC ";
	 } elseif ($ordenusu=='Orden Descendente') {
	 	$mostrarusu = "SELECT * FROM  usuarios order by NomUsuario DESC";
	 } 


	$resultadomostrar=mysqli_query($conexion, $mostrarusu);
	// mysqli_query = realiza una petición a la base de datos, 
	// requiere variable que guarda la conexion "viene del archivo conectar.php" 
	// + variable con la sentencia de buscar, guarda verdadero si hay coinciderncia
	
	
	if ($resultadomostrar) {
?>

		<h2>USUARIOS REGISTRADOS</h2>
		<table>
			<tr>
				<th> Id Usuario </th>
				<th> Nombre usuario </th>
				<th> Email </th>
				<th> Fecha Registro </th>
			</tr>
		
		<?php 
		// fetch_array= Guarda los datos en el indice numerico de la matriz, 
		// guarda también los datos en los indices asociativos, usando el nombre de campo como clave.
		while ( $filas= mysqli_fetch_array($resultadomostrar)) {
			// ser crean variables para guardar los valores devueltos en el array
			$idusuario=$filas['IdUsuario'];
			$nomusuario=$filas['NomUsuario'];
			$emailusuario=$filas['EmailUsuario'];
			$fecha_reg=$filas['FechaRegistro'];
		?>
			<!-- se crean filas y cada columna almacena un dato según la variable indicada $iddatos - $nombre - $email - $fecha_reg-->
			<!-- se debe combinar las sentencias html con las instrucciones en php para imprimir las variables-->
			<tr>
				<td> <?php echo $idusuario ?></td>
				<td> <?php echo $nomusuario ?></td>
				<td> <?php echo $emailusuario ?></td>
				<td> <?php echo $fecha_reg ?></td>				
			</tr>
		
		<?php
		}
		?>
		<!-- cierre de la tabla html -->
		</table> 

		<?php    
		} else {
			echo "<script> alert('No existen registros por mostrar');
		 	location.href='index.php';
		 	</script>";
		 	// se incluye script de java para que aparezca cuadro de diálogo, 
			// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
		}	
		?>

<a href="index.php"> volver </a>