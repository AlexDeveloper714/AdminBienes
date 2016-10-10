<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tabla de Clientes</title>
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/metisMenu_min.css" rel="stylesheet">
        <link href="css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="banner">
                <div class="navbar-header">
                    <i class="fa fa-edit fa-fw"></i>ADMINISTRACI&Oacute;N DE BIENES
                </div>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-edit fa-fw"></i> Formulario</a>
                            </li>
                            <li>
                                <a href="tabla_clientes.php"><i class="fa fa-users fa-fw"></i> Tablas clientes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="row" id="cliente">
                    <div class="col-md-12">
                        <h1 class="page-header"><i class="fa fa-suitcase fa-fw"></i>Datos Clientes</h1>
                        <form method="post" action="control.php" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Datos Cliente</legend>
                                <div id="izq">
                                    Nombres: <b>*</b>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    C&eacute;dula: <b>*</b>
                                    <input type="number" id="cedula" name="cedula" class="form-control"  required>
                                    Sexo: <b>*</b>
                                    <label for="macho">hombre
                                        <input type="radio" id="macho" name="genero" value="hombre" checked required>
                                    </label> 
                                    <label for="hembra">mujer
                                        <input type="radio" id="hembra" name="genero" value="mujer"  required>
                                    </label>
                                    <div>
                                        Correo Electronico: <b>* </b><input type="email" id="correo" name="correo" class="form-control" required>
                                    </div>
                                </div>
                                <div id="der">
                                    Apellido: <b>* </b><input type="text" id="apellido" name="apellido" class="form-control" required>
                                    Fecha Nacimiento: <b>* </b><input type="date" id="fecha" name="fecha" class="form-control" required>
                                    N&uacute;mero Hijos: <b>* </b><input type="number" id="hijos" name="hijos"  min="1" max="10" class="form-control" required>
                                    Fotografia: <b>* </b>
                                    <input type="file"  id="file" name="file" class="btn-group"required>
                                </div>
                            </fieldset><br>
                            <input type="submit" id="envioCl" name="enviarCliente" value="Enviar Cliente" class="btn">
                        </form>
                    </div>
                </div>
                <div class="row" id="activo">
                    <div class="col-md-12">
                        <h1 class="page-header"><i class="fa fa-users fa-fw"></i>Datos Activos</h1>
                        <form method="post" action="control.php">
                            <fieldset>
                                <legend>Datos Activos</legend>
                                <div id="izq">
                                    Id Cliente: <b>* </b><select id="idCliente" name="idCliente" class="form-control" required>
                                        <?php
                                        require_once 'database.php';
                                        $db = new database();
                                        $db->conectar();
                                        $res = $db->consultarDB("clientes", "id_cliente");
                                        while ($row = mysql_fetch_array($res)) {
                                            echo '<option>';
                                            echo $row['id_cliente'];
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>                     
                                    Tipo Activo: <b>* </b><select id="tipoActivo" name="tipoActivo" class="form-control" required>
                                        <?php
                                        require_once 'database.php';
                                        $db = new database();
                                        $db->conectar();
                                        $res = $db->consultarDB("tipo_activo", "nombre");
                                        while ($row = mysql_fetch_array($res)) {
                                            echo '<option>';
                                            echo $row['nombre'];
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                    Marca:<input type="text" id="marca" name="marca" class="form-control">
                                    Descripci&oacute;n <b>* </b><textarea id="describir" name="describir" placeholder="Describe tu situación" class="form-control" rows="3" required></textarea>
                                </div>
                                <div id="der">
                                    Id Activo: <b>* </b><input type="number" id="idActivo" name="idActivo"  class="form-control" required>                   
                                    Categoria: <b>* </b><select id="categoria" name="categoria"  class="form-control" required>
                                        <?php
                                        require_once 'database.php';
                                        $db = new database();
                                        $db->conectar();
                                        $res = $db->consultarDB("categoria", "nombre");
                                        while ($row = mysql_fetch_array($res)) {
                                            echo '<option>';
                                            echo $row['nombre'];
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                    Modelo: <b>* </b><input type="text" id="modelo" name="modelo"  class="form-control" required>
                                    Notas:<textarea id="notas" name="notas" placeholder="Escribe tus comentarios" class="form-control" rows="3"></textarea>
                                </div>
                            </fieldset><br>
                            <input type="submit" id="envioAc" name="enviarActivo" value="Enviar Activo" class="btn">
                        </form>
                    </div>
                </div>
                <br>
                <input type="button" id="back" name="back" value="Atras" class="btn">
                <input type="button" id="next" name="next" value="Siguiente" class="btn">
                <button type="button" class="btn" onclick="location = 'tabla_clientes.php'">Ver informe de clientes</button>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script>
                        $(document).ready(function () {
                            $('#dataTables-example').DataTable({
                                responsive: true
                            });
                        });
        </script>
    </body>
</html> 