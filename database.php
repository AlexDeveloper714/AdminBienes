<?php

class database {

    private $usuario;
    private $password;
    private $servidor;
    private $nomDB;
    private $link;

    function database() {
        $this->usuario = "root";
        $this->password = "";
        $this->servidor = "localhost";
        $this->nomDB = "adminbienes";
        $this->link = "";
    }

    function conectar() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->password);
        mysql_select_db($this->nomDB, $this->link);
    }

    function insertar($fila = array(), $tabla = "") {
        $valoresFila = "";
        while (list($key, $val) = each($fila)) {
            $valoresFila = $valoresFila . " '" . $val . "', ";
        }
        $valoresFila = substr($valoresFila, 0, -2);
        mysql_query(" insert into " . $tabla . " values( " . $valoresFila . ");")or die("la consulta fallo (insertar)" . mysql_error());
    }

    function actualizarActivos($fila = array(), $tabla = "", $id_Activo = "") {
        $actualizar = "update " . $tabla . " set tipo_activo='$fila[0]', "
                . "categoria='$fila[1]', marca='$fila[2]', modelo='$fila[3]',"
                . " descripcion='$fila[4]', notas='$fila[5]' where id_activos='$id_Activo'";
        $res=mysql_query($actualizar)or die("la consulta fallo (insertar)" . mysql_error());
        return $res;
    }

    function actualizar($fila = array(), $tabla = "", $idCliente = "") {
        $actualizar = "update " . $tabla . " set correo='$fila[0]', num_hijos='$fila[1]', ruta='$fila[2]' where id_cliente='$idCliente'";
        mysql_query($actualizar) and mysql_info();
    }

    function insertarActivo($fila = array(), $tabla = "") {
        $valoresFila = "";
        while (list($key, $val) = each($fila)) {
            $valoresFila = $valoresFila . " '" . $val . "', ";
        }
        $valoresFila = substr($valoresFila, 0, -2);
        //quitar en sql_error($link) si no es link + $this-> link
        mysql_query(" insert into " . $tabla . " values( " . $valoresFila . ");")or die("la consulta fallo(insertarActivo)" . mysql_error());
    }

    function consultarDB($tabla = "", $campo = "", $dato = "", $campoEspeci = "") {
        if ($campo == "") {
            $query = "select * from " . $tabla;
        } else if ($dato == "") {
            $query = "select " . $campo . " from " . $tabla;
        } else if ($campoEspeci == "") {
            $query = "select * from " . $tabla . " where " . $campo . " = " . $dato;
        } else {
            $query = "select " . $campoEspeci . " from " . $tabla . " where " . $campo . " = " . $dato;
        }
        $res = mysql_query($query);
        return $res;
    }

}

?>