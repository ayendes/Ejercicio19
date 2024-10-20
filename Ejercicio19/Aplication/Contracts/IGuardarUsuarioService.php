<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Aplication/Contracts/.php";

interface IGuardarUsuarioService {
    public function guardarUsuario(UsuarioModel $usuario) : int;
}