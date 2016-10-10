<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tabla de Activos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metisMenu_min.css" rel="stylesheet">
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="banner2">
                <div class="navbar-header">
                    <a class="navbar-brand"><i class="fa fa-user fa-fw"></i>Datos Usuario</a>
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
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header"><i class="fa fa-rebel fa-fw"></i> Informaci&oacute;n Basica</h1>
                        <h1>                                
                            <?php
                            $id_Cliente = $_GET['id_Cliente'];
                            require_once 'dataBase.php';
                            $db = new dataBase();
                            $db->conectar();
                            $rec = $db->consultarDB("clientes", "id_cliente", $id_Cliente);
                            while ($row = mysql_fetch_array($rec)) {
                                $usuario = $row[1] . " " . $row[2];
                            }
                            echo 'Bienvenido de nuevo ' . $usuario;
                            ?></h1>
                        <div class="col-md-3">
                            <?php
                            require_once 'dataBase.php';
                            $db->conectar();
                            $rec = $db->consultarDB("clientes", "id_cliente", $id_Cliente);
                            while ($row = mysql_fetch_array($rec)) {
                                $ruta = $row[7];
                            }
                            echo '<img height="200 px" width="200 px" src="' . $ruta . '">';
                            ?>
                        </div>
                        <div class="col-md-3">
                            <?php
                            require_once 'dataBase.php';
                            $db->conectar();
                            $rec = $db->consultarDB("clientes", "id_cliente", $id_Cliente);
                            while ($row = mysql_fetch_array($rec)) {
                                echo 'ID CLIENTE: ' . $row[0] . "<br>";
                                echo 'NOMBRE: ' . $row[1] . "<br>";
                                echo 'APELLIDO: ' . $row[2] . "<br>";
                                echo 'GENERO: ' . $row[3] . "<br>";
                                echo 'FECHA DE NACIMIENTO: ' . $row[4] . "<br>";
                                echo 'CORREO: ' . $row[5] . "<br>";
                                echo 'HIJOS: ' . $row[6] . "";
                            }
                            ?>                               
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="control.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-7">
                                        <fieldset>
                                            Cedula: <input type="cedula"  name="cedula" value=
                                            <?php
                                            echo $id_Cliente;
                                            ?> class="form-control" readonly>
                                            Correo Electronico: <b>* </b><input type="email"  name="correo" class="form-control" required>
                                            N&uacute;mero Hijos: <b>* </b><input type="number" name="hijos"  min="1" max="10" class="form-control" required>
                                            Fotografia: <b>* </b>
                                            <input type="file"  name="file" class="form-control"required><br>
                                            <input type="submit" name="actualizarDatos" value="actualizar datos" class="form-control">
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h1 class="page-header"><i class="fa fa-briefcase fa-fw"></i> Informe de Activos</h1>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id-activos</th>
                                            <th>tipo Activo</th>
                                            <th>categoria</th>
                                            <th>marca</th>
                                            <th>modelo</th>
                                            <th>descripción</th>
                                            <th>notas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'dataBase.php';
                                        $db->conectar();
                                        $rec = $db->consultarDB("activos", "id_cliente", $id_Cliente);
                                        while ($row = mysql_fetch_array($rec)) {
                                            echo "<tr>";
                                            echo "<td>$row[0]</td>";
                                            echo "<td>$row[1]</td>";
                                            echo "<td>$row[3]</td>";
                                            echo "<td>$row[4]</td>";
                                            echo "<td>$row[5]</td>";
                                            echo "<td>$row[6]</td>";
                                            echo "<td>$row[7]</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h1 class="page-header"><i class="fa fa-briefcase fa-fw"></i> Activos a cambiar</h1>
                        <div class="panel panel-default">
                            <form method="post" action="control.php">
                                <div class="panel-body">
                                    <fieldset>
                                        <div class="col-md-6">
                                            Id Cliente: <input type="text" id="cedula" name="cedula"  value="<?php echo $id_Cliente; ?>" class="form-control" readonly>
                                            Id Activo: <b>* </b>
                                            <select id="idActivo" name="idActivo" class="form-control" value=
                                            <?php
                                            require_once 'database.php';
                                            $db->conectar();
                                            $res = $db->consultarDB("activos", "id_cliente", $id_Cliente, "id_activos");
                                            while ($row = mysql_fetch_array($res)) {
                                                echo '<option>';
                                                echo $row[0];
                                                echo '</option>';
                                            }
                                            ?>
                                                    ></select>
                                            Tipo Activo: <b>* </b><select id="tipoActivo" name="tipoActivo" class="form-control" required>
                                                <?php
                                                require_once 'database.php';
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
                                        <div class="col-md-6">
                                            Categoria: <b>* </b><select id="categoria" name="categoria"  class="form-control" required>
                                                <?php
                                                require_once 'database.php';
                                                $db->conectar();
                                                $res = $db->consultarDB("categoria", "nombre");
                                                while ($row = mysql_fetch_array($res)) {
                                                    echo '<option>';
                                                    echo $row['nombre'];
                                                    echo '</option>';
                                                }
                                                $_POST['id_Cliente'] = $id_Cliente;
                                                ?>
                                            </select>
                                            Modelo: <b>* </b><input type="text" id="modelo" name="modelo"  class="form-control" required>
                                            Notas:<textarea id="notas" name="notas" placeholder="Escribe tus comentarios" class="form-control" rows="3"></textarea>
                                        </div>
                                    </fieldset><br>
                                    <input type="submit" id="envioAc" name="actualizarActivo" value="Actualizar Activo" class="btn btn-default">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-default" onclick="location = 'index.php'">Regresar al formulario</button>
                <button type="button" class="btn btn-default" onclick="location = 'tabla_clientes.php'">Ver informe de clientes</button>
                <button type="button" class="btn btn-default" onclick="location = window.location">Actualizar Información</button>
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