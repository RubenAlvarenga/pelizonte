<?php include_once("header.php") ?>
    <?php 
    if(isset($_POST['abuscar'])) {
        $comando = 'SELECT p.*, g.nombre as genero FROM pelicula as p join genero as g on g.id=p.id_genero where p.nombre like "%'.$_POST['abuscar'].'%";';
    }else{    
        $comando = 'SELECT p.*, g.nombre as genero FROM pelicula as p join genero as g on g.id=p.id_genero';
    }    
    $consulta = mysql_query($comando);
        if (mysql_num_rows($consulta) > 0){
            while($row=mysql_fetch_array($consulta)){
                echo "<a href='ver_pelicula.php?id=".$row["id"]."'>";
                echo "<div class='grppelicula'>";
                if ($row["afiche"]){
                    printf ("<div><img class='afiche' src='uploads/".$row["afiche"]."' height='140' width='95'></div>");
                }else{
                    printf ("<div><img class='afiche' src='uploads/default.jpg' height='140' width='95'></div>");                                
                }       
                printf ("<div class='codigo'>".$row["id"]."</div>");
                printf ("<div class='nombre'>".$row["nombre"]."</div>");
                printf ("<div class='director'>".$row["director"]."</div>");
                printf ("<div class='genero'>".$row["genero"]."</div>");
                printf ("<div class='anho'>".$row["ano"]."</div>");
                echo "</div>";
                echo "</a>";
            }
            
        }else{
            echo "<div class='error'>";
            echo "No se encontraron resultados con el criterio: <strong>".$_POST['abuscar']."</strong>";
            echo "</div>";
        }
    ?>
<?php include_once("footer.php") ?>









