<?php 
	// require= llama el archivo conectar.php 
	require"conectar.php";
	
	// crear variables para recibir datos del formulario
	// trim = función para quitar espacio en blanco del inicio o final del dato capturado
	$nombreusu = trim($_POST['nombreusu']);
	$registro=0;

	// $ingresoperfil = variable para enviar sentencia SQL y buscar datos.
	// solo se envía nombre de usuario para buscar coincidencia 
	
	if ($nombreusu=="" ) {
		$registro=2;
		echo "<script> alert('Nombre de Usuario Vacío');
				location.href='index.php';
	 		</script>";
				
	} else{  

		$buscarusu = "SELECT* FROM usuarios where NomUsuario='$nombreusu'";

		$buscarusuario=mysqli_query($conexion, $buscarusu);
		// mysqli_query = realiza una consulta a la base de datos, requiere variable que guarda la conexion "viene del archivo conectar.php" + variable con la sentencia de buscar, guarda verdadero si hay coinciderncia
		
		if ($buscarusuario) {			
?>
			<h2>USUARIO CONSULTADO</h2>
			<table>
				<tr>
					<th> Id Usuario </th>
					<th> Nombre usuario </th>
					<th> Email </th>
					<th> Fecha Registro </th>
				</tr>
<?php
				// $consulta =variable para guardar los valores devueltos en el array
				while ($consulta= mysqli_fetch_array($buscarusuario)) {
					// ser crean variables para guardar los valores devueltos en el array
					$IdUsuario=$consulta['IdUsuario'];
					$NomUsuario=$consulta['NomUsuario'];
					$EmailUsuario=$consulta['EmailUsuario'];
					$FechaRegistro=$consulta['FechaRegistro'];	
					$registro=1;
?>
					<!-- se crean filas y cada columna almacena un dato según la variable indicada $iddatos - $nombre - $email - $fecha_reg-->
					<!-- se debe combinar las sentencias html con las instrucciones en php para imprimir las variables-->
					<tr>
						<td><?php echo $IdUsuario ?></th>
						<td><?php echo $NomUsuario ?></th>
						<td><?php echo $EmailUsuario ?></th>
						<td><?php echo $FechaRegistro ?></th>				
					</tr>				
<?php
				}		
?>
			</table>
<?php						 
		}
	}			
	if ($registro==0) {
		echo "<script> alert('Usuario No Existe');
				location.href='index.php';
	 		</script>";
	}
	if ($registro==1) {		
?>	
		<form action="eliminausu.php" method="post">
			<h1>ELIMINAR REGISTRO DE USUARIO</h1>
			<label name="IdUsuario "> ID Usuario a eliminar: </label>
			<input type="text" name="IdUsuario" value= "<?php echo $IdUsuario ?>"> <br> <br>
			<input type="submit" name="eliminausu" value="Eliminar">
		</form>		
	<!-- botón para volver al index de buscar -->
		<form action="index.php" method="post">
			<input type="submit" name="inicio" value="Volver">
		</form>
<?php 	
	}	
 ?>	
	