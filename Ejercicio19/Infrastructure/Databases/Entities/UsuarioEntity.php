<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Domain/Model/UsuarioModel.php";

class UsuarioEntity extends ActiveRecord\Model{
    public static $tabla_nombre = "Usuarios";

    public static $primary_key = "id";

    // Relaciones con
    public static $has_many = ["evaluaciones"];

    public static function mmapperEntityToModel(): UsuarioModel{
        $usuarioModel = new UsuarioModel(
            $this->id,
            $this->password,
            $this->nombre,
            $this->apellidos  
        );
        $usuarioModel->setRol($this->rol);
        $usuarioModel->setEmail($this->email);
        $usuarioModel->setTelefono($this->telefono);
        $usuarioModel->setEstado($this->estado);
        $usuarioModel->setFecha_registro($this->fecha_registro);
        return $usuarioModel;  
    }

    public static function mapperModeloToEntity(UsuarioModel $usuarioModel):UsuarioEntity{
        $usuarioEntity = new UsuarioEntity();
        $usuarioEntity->getId();
        $usuarioEntity->setPassword();
        $usuarioEntity->setNombre();
        $usuarioEntity->setApellidos();
        $usuarioEntity->getRol();
        $usuarioEntity->getEmail();
        $usuarioEntity->getTelefono();
        $usuarioEntity->getEstado();
        $usuarioEntity->getFecha_registro();
        return $usuarioEntity;
    }
    
}