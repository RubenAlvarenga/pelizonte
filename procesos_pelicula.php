<?php include_once("header.php") ?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Datos del formulario
		$nombre = $_POST['nombre'];
		$director = $_POST['director'];
		$id_genero = $_POST['id_genero'];
		$ano = $_POST['ano'];
		if ($ano == ""){ $ano = 0;}
		$sinopsis = $_POST['sinopsis'];
		$boton= $_POST['boton'];
		$padimagen="";
		if ($_FILES["imagen"]["error"] > 0){
			echo "<div class='error'>ha ocurrido un error</div>";
		} else {
			//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
			//y que el tamano del archivo no exceda los 100kb
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 100;

			if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
				$ruta = "uploads/" . $_FILES['imagen']['name'];
				//comprobamos si este archivo existe para no volverlo a copiar.
				//pero si quieren pueden obviar esto si no es necesario.
				//o pueden darle otro nombre para que no sobreescriba el actual.
				if (!file_exists($ruta)){
					//aqui movemos el archivo desde la ruta temporal a nuestra ruta
					//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
					//almacenara true o false
					$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
					if ($resultado){
						echo "<div class='error'>el archivo ha sido movido exitosamente</div>";
						$padimagen = $_FILES['imagen']['name'];
					} else {
						echo "<div class='error'>ocurrio un error al mover el archivo.</div>";
					}
				} else {
					echo $_FILES['imagen']['name'] . ", este archivo existe";
				}
			} else {
				echo "<div class='error'>archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes</div>";
			}
		}

		if ($nombre == ""){ echo "<div class='error'>El campo Nombre es requerido</div>";}
		if ($id_genero == ""){ echo "<div class='error'>El campo Genero es requerido</div>";}

		if ($boton == 'Guardar'){
			$comando = "INSERT INTO pelicula (nombre, director, id_genero, afiche, ano, sinopsis) VALUES ('$nombre', '$director', $id_genero, '$padimagen', $ano, '$sinopsis' )";
			if (mysql_query($comando)) {
				header('Location: index.php');
			}else{
				echo "<div class='error'>por favor intente de nuevo</div>";
			}
		}else if ($boton == 'Registrar'){
			$id = $_POST['id'];
			if ($padimagen==""){
				$comando = "UPDATE pelicula SET nombre='$nombre', director='$director', id_genero=$id_genero, ano=$ano, sinopsis='$sinopsis' WHERE id=".$id;
			}else{
				$comando = "UPDATE pelicula SET nombre='$nombre', director='$director', id_genero=$id_genero, afiche='$padimagen', ano=$ano, sinopsis='$sinopsis'  WHERE id=".$id;
			}
			if (mysql_query($comando)) {
				header('Location: ver_pelicula.php?id='.$id);
			}else{
				echo "<div class='error'>por favor intente de nuevo</div>";
			}			
		}

	}
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$comando="DELETE from pelicula where id=".$_GET['id'];
		if (mysql_query($comando)) {
			header('Location: index.php');
		}else{
			echo "<div class='error'>No se pudo borrar</div>";
		}	
	}
?>
<?php include_once("footer.php") ?>
