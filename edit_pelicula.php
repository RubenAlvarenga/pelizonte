<?php include_once("header.php") ?>
<form enctype="multipart/form-data" method="POST" action="procesos_pelicula.php">
    <input type='hidden' name='id' value='<?php echo $_GET['id']; ?>' >
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
                printf ("<strong>Pelicula:</strong></br><input type='text' name='nombre' size='40' value='".$row["nombre"]."'></br>");
                printf ("<strong>Director:</strong></br><input type='text' name='director' size='40' value='".$row["director"]."'></br>");
                printf ("<strong>Genero:</strong></br>");
                printf ("<select name='id_genero'>");
                $comandog = 'SELECT * FROM genero';
                $consultag = mysql_query($comandog);
                while($rowg=mysql_fetch_array($consultag)){
                    if($rowg["id"] == $row["id_genero"]){ 
                        $seleccionado="selected='selected'";
                    }else{ 
                        $seleccionado="";
                    }
                    printf ("<option ".$seleccionado." value='".$rowg["id"]."'>".$rowg["nombre"]."</option>");
                }
                printf ("</select>");
                printf ("</br><strong>Afiche:</strong></br>");
                printf ("<input type='file' name='imagen'>");
                printf ("<strong>A&ntilde;o:</strong></br><input type='text' name='ano' size='6' value='".$row["ano"]."'>");
                printf ("<br><strong>Sinopsis:</strong></br><textarea name='sinopsis' cols='40' rows='7'>".$row["sinopsis"]."</textarea>");
            }
        ?>
        <div class="btnverpeli">
            <input class="btn btn-primary" type="submit" value="Registrar" name="boton">
            <a href="ver_pelicula.php?id=<?php echo $_GET['id']; ?>" class="btn btn-default" role="button"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</a>
        </div>
	</div>
</form>
<?php include_once("footer.php") ?>





