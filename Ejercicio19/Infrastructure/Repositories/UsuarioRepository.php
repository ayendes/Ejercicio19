<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Aplication/Exceptions/EntityPreexistentingExceptio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Infrastructure/Databases/Entities/UsuarioEntity.php";

class UsuarioRepository implements IUsuarioRepository {

    public function crearUsuario(UsuarioModel $usuarioModel): int {
        try {
            $usuario = null;
            if($usuario!== null){
             $message = "Usuario Existente";
            throw new EntityPreexistingException($message);   
            }
        } catch (Exception $e) {
            $usuario = new UsuarioEntity();
            $usuario->id = $usuarioModel->getId();
            $usuario->password = $usuarioModel->setPassword();
            $usuario->nombre = $usuarioModel->setNombre();
            $usuario->apellidos = $usuarioModel->setApellidos();
            $usuario->rol = $usuarioModel->getRol();
            $usuario->email = $usuarioModel->getEmail();
            $usuario->telefono = $usuarioModel->getTelefono();
            $usuario->estado = $usuarioModel->getEstado();
            $usuario->fecha_registro = $usuarioModel->getFecha_registro();
            //$usuario->guardar();
            //return $this->contador;
        }
    }

    public function buscarUsuario(int $id): UsuarioModel {
        try {
            $usuario = UsuarioEntity::find($id);
            return $usuario->mapperEntityToModel();
        } catch (Exception $e) {
            $message = "Usuario no Existente";
            throw new EntityNotFoundException( $message);
        }
    }

    public function editarUsuario(UsuarioModel $usuarioModel) {
        try {
            $usuarioEntity = UsuarioEntity::find ($usuarioModel->getId());
            $$usuarioEntity->id = $usuarioModel->getId();
            $$usuarioEntity->password = $usuarioModel->setPassword();
            $$usuarioEntity->nombre = $usuarioModel->setNombre();
            $$usuarioEntity->apellidos = $usuarioModel->setApellidos();
            $$usuarioEntity->rol = $usuarioModel->getRol();
            $$usuarioEntity->email = $usuarioModel->getEmail();
            $$usuarioEntity->telefono = $usuarioModel->getTelefono();
            $$usuarioEntity->estado = $usuarioModel->getEstado();
            $$usuarioEntity->fecha_registro = $usuarioModel->getFecha_registro();
            $$usuarioEntity->guardar();
            
        } catch (Exception $e) {
                $message = "Usuario Existente";
                throw new EntityNotFoundException($Message);
            
        }
    }

    public function eliminarUsuario(int $id) {
        try {
            $usuarioEntity = UsuarioEntity::find($id);
            $usuarioEntity->delete();
        } catch (Exception $e) {
            throw new EntityNotFoundException("Error al eliminar el usuario: " . $e->getMessage());
        }
    }

    public function listarUsuarios(): array {
        $usuariosEntity = UsuarioEntity::all();
        $usuariosModel = [];
        foreach ($usuariosEntity as $usuariobd){
            $usuariosModel = $usuariobd->mapperEntityToModel();
            $usuariosModel[] = $usuarioModel;
        }
        return $usuariosModelList;
    }
}

