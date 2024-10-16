<?php
require_once $_SERVER["DOCUMENT_ROOT"] ."/ejercicio19/Domain/Model/UsuarioModel.php";

interface IUsuarioRepository{
    public function crearUsuario(UsuarioModel $usuarioModel): int;

    public function buscarUsuario(int $id): UsuarioModel;

    public function editarUsuario(UsuarioModel $usuarioModel);

    public function eliminarUsuario(int $id);

    public function listarUsuarios(): array; 
}