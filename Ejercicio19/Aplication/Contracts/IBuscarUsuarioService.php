<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Aplication/Contracts/.php";

interface IBuscarUsuarioService {
    public function buscarUsuario(UsuarioModel $usuario) : int;
}