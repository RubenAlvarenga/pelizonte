<?php include_once("header.php") ?>


<form enctype="multipart/form-data" method="POST" action="procesos_pelicula.php">
    <div class='verpelicula'>
        <strong>Pelicula:</strong></br><input type='text' name='nombre' size='40'></br>
        <strong>Director:</strong></br><input type='text' name='director' size='40'></br>
        <strong>Genero:</strong></br>
        <select name='id_genero'>
            <option value="">Selecciona...</option>
            <?php
            $comandog = 'SELECT * FROM genero';
            $consultag = mysql_query($comandog);
            while($rowg=mysql_fetch_array($consultag)){
                printf ("<option value='".$rowg["id"]."'>".$rowg["nombre"]."</option>");
            }
            ?>
        </select>
        </br><strong>Afiche:</strong></br>
        <input type='file' name='imagen'>
        <strong>A&ntilde;o:</strong></br><input type='text' name='ano' size='6'>
        <br><strong>Sinopsis:</strong></br><textarea name='sinopsis' cols='40' rows='7'>Sea breve solo 255 caracteres</textarea>
        <div class="btnverpeli">
			<input class="btn btn-primary" type="submit" value="Guardar" name="boton">
			<input class="btn btn-default" type="reset" value="Limpiar">
        </div>
    </div>
</form>

<?php include_once("footer.php") ?>





