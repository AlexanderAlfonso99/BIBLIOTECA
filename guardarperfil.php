<?php 
	// require= llama el archivo conectar.php 

	require"conectar.php";
	
	// crear variables para recibir datos del formulario
	// trim = función para quitar espacios en blanco del inicio o final del dato capturado
	$tipoperfil = $_POST['tipoperfil'];
	$usuperfil = trim($_POST['usuperfil']);
	$pswperfil = $_POST['pswperfil'];
	
	// $pswencrip= variable para guardar password encriptado con el algoritmo hash, seguro 
	$pswencrip = password_hash($pswperfil, PASSWORD_DEFAULT); 

	// date=función para capturar la fecha actual del sistema
	$fechaperfil = date("y/m/d"); 

	// $registro = variable para enviar sentencia SQL e insertar datos.
	// se debe enviar variable con contraseña encriptada por seguridad 
	$registroperfil = "INSERT INTO Perfil(PerfilReg, NombreReg, PassReg, FechaReg) VALUES ('$tipoperfil','$usuperfil','$pswencrip', '$fechaperfil')";

	// mysqli_query = realiza la sentencia indicada en la base de datos, requiere variable que guarda la conexion "viene del archivo conectar.php" + variable con la sentencia de insertar, guarda verdadero si se hace correctamente
	$insertar=mysqli_query($conexion, $registroperfil);

	// if para validar que se insertaron datos de manera adecuada en la tabla, se evalua la variable de mysqli_query
	if ($insertar) {
		// se incluye script de java para que aparezca cuadro de diálogo, 
		// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
	 	echo "<script> alert('Inscrito correctamente');
	 	location.href='index.php';
	 	</script>";
	 } else {
		// se incluye script de java para que aparezca cuadro de diálogo, 
		// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
	 	echo "<script> alert('Error en la inscripción');
	 	location.href='index.php';
	 	</script>";
	 }	   
?>