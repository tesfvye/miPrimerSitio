<?php

require_once('modelo.php');
require_once('config.php');
require_once('hash.php');

class UsuarioModel extends Modelo
{
    public function __construct(){
        parent::__construct();
       // session_start();
    }

    public function getUsuarioId($id)
    {
        $id = (int) $id;

        $usuario = $this->_db->prepare("SELECT id FROM usuarios WHERE id = ?");
        $usuario->bindParam(1, $id);
        $usuario->execute();
        
        return $usuario->fetch();

    }

    //metodo que consulte por el usuario y clave.
    public function getUsuarioLogin($email, $clave)
    {
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);// Encriptación de la clave

        $usuario = $this->_db->prepare("SELECT u.id, p.nombre, r.nombre FROM usuarios u INNER JOIN personas p ON u.persona_id = p.id INNER JOIN roles r 
        ON p.rol_id = r.id WHERE p.email = ? AND u.clave = ? AND u.activo = 1 ");
        $usuario->bindParam(1, $email);
        $usuario->bindParam(2, $clave);
        $usuario->execute();
        
        return $usuario->fetch();
    }

    //metodo para verificar que una persona no tiene cuenta de usuario
    public function getUsuarioPersona($persona)
    {
        $persona = (int) $persona;

        $usuario = $this->_db->prepare("SELECT id FROM usuarios WHERE persona_id = ?");
        $usuario->bindParam(1, $persona);
        $usuario->execute();

        return $usuario->fetch();
    }

    //metodo para agregar usuario
    public function setUsuario($clave, $persona)
    {
        $persona = (int) $persona;
        //encriptar la clave;
        $clave = Hash::getHash('sha1', $clave, HASH_KEY);

        //activo = 1
        //inactivo = 2

        $usuario = $this->_db->prepare("INSERT INTO usuarios(clave, activo, persona_id, created_at, updated_at) VALUES(?, 1, ?, now(), now() ) ");
        $usuario->bindParam(1, $clave);
        $usuario->bindParam(2, $persona);
        $usuario->execute();

        $row = $usuario->rowCount();
        return $row;
    }

    public function updatePassword ($id, $clave)
    {
        $id = (int) $id;

        $usuario = $this->_db->prepare ("UPDATE usuarios SET clave = ?, updated_at = now() WHERE id = ?");
        $usuario->bindParam(1, $clave);
        $usuario->bindParam(2, $id);
        $usuario->execute();

        $row = $usuario;
    }
}