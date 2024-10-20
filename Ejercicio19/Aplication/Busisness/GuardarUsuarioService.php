<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Aplication/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Aplication/Contracts/IUsuarioRepository.php";

class GuardarUsuarioService implements IGuardarUsuarioService {

    private $usuarioRespository;

    public function __construct(IUsuarioRepository $usuarioRespository){
        $this->$usuarioRespository = $usuarioRespository;
    }

    public function guardarUsuario(UsuarioModel $usuario) : int{
       return $this->$usuarioRespository->crearUsuario($usuario);
    }
}    