<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="LATIN1">
        <title>pelizonte</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/misestilos.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
    </head>
    <body>
    <?php include_once("conexion.php") ?>
    <div class="container-fluid">
    <div class="row">
    <header>

        <div class="container-fluid">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="datosalumna">
                <strong>Trabajo Practico de Gestion de Sitios Web - UAA</strong> | 22-jul-2015 | 
                <strong>Alumna: </strong>Cynthia Noelia Guerrero
            </div>
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logobox" href="index.php"><span class="glyphicon glyphicon-facetime-video"></span><span id="logo"> pelizonte</span></a>
                    </div>
                    <form class="navbar-form navbar-left" role="search" method="POST" action="index.php">
                        <div class="input-group">
                          <input type="text" class="form-control" name="abuscar" placeholder="Ingrese Nombre Pelicula">
                          <span class="input-group-btn">
                            <input class="btn btn-default" type="submit" value="Buscar" name="btnbuscar">
                          </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right addpeli">
                        <a href="add_pelicula.php" class="btn btn-primary" role="button">
                        <span class="glyphicon glyphicon-plus"></span> Agregar Pelicula</a>
                    </ul>
                </div>
            </nav>    
        </div>
    </header>
    <div style="margin-bottom: 60px" class="container-fluid">
        <div class="row">
            <div class="col-xs-12" id="page-content-wrapper">
