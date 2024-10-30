<?php 
	// include= llama el archivo conectar.php 

	include("conectar.php");
	
	
	if($conexion){//valida si la conexión fue exitosa 
		// Trae los datos del formulario
		//$variable: se define la variable, es no tipado 
		//trim elimina los espacios blancos en ambos extremos del string
		$nombre = trim($_POST['nombre']); 
		$genero = trim($_POST['genero']);
		$autor = trim($_POST['autor']);

		// Preparar la consulta SQL para insertar el registro
		            //INSERT INTO libro(NomLibro, GeneroLibro, Autor) VALUES ('El código Da Vinci','Misterio','Desconocido');
		$insertar = "INSERT INTO libro(NomLibro, GeneroLibro, Autor) VALUES ('$nombre','$genero','$autor')";
		
		$resultado=mysqli_query($conexion,$insertar);
		
		if($resultado){
			// se incluye script de java para que aparezca cuadro de diálogo, 
			// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
			echo "<script> alert('El Registro del libro fue exitoso');
			location.href='index.php';
			</script>";
		}
		else {
			// se incluye script de java para que aparezca cuadro de diálogo, 
			// location.href= devuelve a la página deseada, después de cerrar el cuadro de dialogo 
			echo "<script> alert('No Inscrito...revisar configuración');
			location.href='index.php';
			</script>";
		}
		
		
	}

	$conexion->close();
?>