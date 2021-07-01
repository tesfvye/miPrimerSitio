<?php
require_once('modelo.php');

class marcasModel extends Modelo
{
    public function __construct()
    {
        //utilizar el constructor de la clase Modelo 
        parent::__construct();
    }

    //metodo que muestra todas las marcas de la tabla marcas
    public function getMarcas()
    {
        $marcas = $this->_db->query("SELECT id, nombre FROM marcas ORDER BY nombre");
        return $marcas->fetchall();
    }

    //metodo que consulta a la tabla marcas por una marca usando el id
    public function getMarcasId($id)
    {
        $id = (int) $id;

        $marcas = $this->_db->prepare("SELECT id, nombre, created_at, updated_at FROM marcas WHERE id = ?");
        $marcas->bindParam(1, $id);
        $marcas->execute();

        return $marcas->fetch();
    }

    //metodo que consulta a la tabla marcas por una marca ingresada
    public function getMarcasNombre($nombre)
    {
        $marcas = $this->_db->prepare("SELECT id FROM marcas WHERE nombre = ?");
        $marcas->bindParam(1, $nombre);
        $marcas->execute();

        return $marcas->fetch(); //vamos a recuperar una marca
    }

    //crear un metodo que inserte marcas en la tabla marcas
    public function setMarcas($nombre)
    {
        //consulta para insertar datos
        //el metodo prepare sirve para crear una sala de espera de sanitizacion de datos antes de ingresar DB
        $marcas = $this->_db->prepare("INSERT INTO marcas VALUES(null, ?, now(), now() )");
        
        //se realiza operacion de sanitizacion
        $marcas->bindParam(1, $nombre);
        
        //ejecutamos la consulta y se envian los datos a la tabla marcas
        $marcas->execute();

        //consultamos si los datos fueron ingresados, consultando el numero de filas que se ha ingresado
        $row = $marcas->rowCount(); //nos devolvera el numero de filas insertadas

        return $row; //disponiblizamos la informacion solicitada para quien la consulte
    }

    //metodo que edita una marca
    public function updateMarcas($id, $nombre)
    {
        $id = (int) $id;

        $marcas = $this->_db->prepare("UPDATE marcas SET nombre = ?, updated_at = now() WHERE id = ? ");
        $marcas->bindParam(1, $nombre);
        $marcas->bindParam(2, $id);
        $marcas->execute();

        $row = $marcas->rowCount();

        return $row;
    }

    //metodo para eliminar marcas
    public function deleteMarcas($id)
    {
        $id = (int) $id;

        $marcas = $this->_db->prepare("DELETE FROM marcas WHERE id = ?");
        $marcas->bindParam(1, $id);
        $marcas->execute();

        $row = $marcas->rowCount();

        return $row;
    }
}