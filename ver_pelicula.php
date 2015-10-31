<?php include_once("header.php") ?>
    <div class='verpelicula'>
	<?php 
		$comando = 'SELECT p.*, g.nombre as genero FROM pelicula as p join genero as g on g.id=p.id_genero where p.id='.$_GET['id'];
		$consulta = mysql_query($comando);
		while($row=mysql_fetch_array($consulta)){
            if ($row["afiche"]){
                printf ("<div><img class='afiche' src='uploads/".$row["afiche"]."' height='258' width='173'></div>");
            }else{
                printf ("<div><img class='afiche' src='uploads/default.jpg' height='258' width='173'></div>");                                
            }       
            printf ("<div class='codigo'>".$row["id"]."</div>");
            printf ("<div class='nombre'>".$row["nombre"]."</div>");
            printf ("<div class='director'>".$row["director"]."</div>");
            printf ("<div class='genero'>".$row["genero"]."</div>");
            printf ("<div class='anho'>".$row["ano"]."</div>");
            printf ("</br><strong>Sinopsis: </strong><div class='sinopsis'>".$row["sinopsis"]."</div>");
        }
	?>
		<div class="btnverpeli">
            <a href="edit_pelicula.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" role="button">
            <span class="glyphicon glyphicon-pencil"></span> Editar Pelicula</a>
            <a href="procesos_pelicula.php?id=<?php echo $_GET['id']; ?>" class="btn btn-danger" role="button">
            <span class="glyphicon glyphicon-remove-circle"></span> Borrar Pelicula</a>
        </div>
    </div>

<?php include_once("footer.php") ?>









