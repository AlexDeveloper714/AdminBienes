<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tabla de Clientes</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metisMenu_min.css" rel="stylesheet">
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/sb-admin-2.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="banner2">
                <div class="navbar-header">
                    <a class="navbar-brand"><i class="fa fa-empire fa-fw"></i>Tabla Clientes</a>
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
                    <h1 class="page-header"><i class="fa fa-empire fa-fw"></i>Tabla Clientes</h1>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resultados Busquedas
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id-Cliente</th>
                                            <th>nombre</th>
                                            <th>apellido</th>
                                            <th>genero</th>
                                            <th>fecha nacimiento</th>
                                            <th>correo</th>
                                            <th># hijos</th>
                                        </tr>
                                    </thead>
                                    <tbody>                            
                                        <?php
                                        require_once 'dataBase.php';
                                        $db = new dataBase();
                                        $db->conectar();
                                        $rec = $db->consultarDB("clientes");
                                        while ($row = mysql_fetch_array($rec)) {
                                            echo "<tr>";
                                            echo "<td><a href='datos_usuario.php?id_Cliente=$row[0]'>$row[0]</a></td>";
                                            echo "<td>$row[1]</td>";
                                            echo "<td>$row[2]</td>";
                                            echo "<td>$row[3]</td>";
                                            echo "<td>$row[4]</td>";
                                            echo "<td>$row[5]</td>";
                                            echo "<td>$row[6]</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-default" onclick="location = 'index.php'">Regresar al formulario</button>
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