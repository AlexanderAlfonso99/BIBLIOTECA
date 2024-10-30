<?php 
	// require= llama el archivo conectar.php 

	require"conectar.php";
	
	// crear variables para recibir datos del formulario
	// trim = función para quitar espacio en blanco del inicio o final del dato capturado
	$usuperfil = trim($_POST['usuperfil']);
	$pswperfil = $_POST['pswperfil'];
	
	// $ingresoperfil = variable para enviar sentencia SQL y buscar datos.
	// solo se envía nombre de usuario para buscar coincidencia 
	$ingresoperfil = "SELECT * FROM  Perfil where NombreReg='$usuperfil'";

	$buscarperfil=mysqli_query($conexion, $ingresoperfil);
	// mysqli_query = realiza una consulta a la base de datos, requiere variable que guarda la conexion "viene del archivo conectar.php" + variable con la sentencia de buscar, guarda verdadero si hay coinciderncia
	
	$filas=mysqli_num_rows($buscarperfil);
	// mysqli_num_rows= devuelve el número de filas con coincidencia $buscarperfil=verdadero, mínimo 1 fila

	$pswencperfil=mysqli_fetch_array($buscarperfil);
	// mysqli_fetch_array= devuelve un array con la información de las columnas "datos" encontrados

	// if para validar el password ingresado se valida que haya una fila coincidente nombre de usuario con el password digitado desencriptado.
	// password_verify = desencripta el password y compara el password digitado + password guardado devuelto en la variable array $pswencperfil['pswperfil'])  
	if (($filas==1) && (password_verify($pswperfil, $pswencperfil['PassReg']))) {
		echo "<script> alert('Bienvenido - Usuario Registrado');
	 	location.href='ingreso.html';
	 	</script>";
	 	// muestra un msn echo que incluye script de java para que aparezca cuadro de diálogo, 
		// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 

	 } else {
		echo "<script> alert('Error en autenticación- Verifique');
	 	location.href='index.php';
	 	</script>";
	 	// se incluye script de java para que aparezca cuadro de diálogo, 
		// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
	 }	   
?>