<?php 
	// crear variables para recibir datos del formulario
	// trim = función para quitar espacio en blanco del inicio o final del dato capturado
	require"conectar.php";

	$idusu = $_POST['IdUsuario'];
		
	$deleteusu = "DELETE FROM usuarios WHERE IdUsuario='$idusu'";
	$usuariodel=mysqli_query($conexion, $deleteusu);		
		// mysqli_query = realiza una consulta a la base de datos, requiere variable que guarda la conexion "viene del archivo conectar.php" + variable con la sentencia de buscar, guarda verdadero si hay coinciderncia
	if ($usuariodel){
		echo "<script> alert('Usuario eliminado de la base de datos');
				location.href='index.php';
			</script>";
	}	
?>		
