<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/ejercicio19/Application/Contracts/IUsuarioRepository.php";

class UsuarioRepository implements IUsuarioRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function crearUsuario(UsuarioModel $usuarioModel): int {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, apellidos, password, rol, email, telefono, estado, fecha_registro) VALUES (:nombre, :apellidos, :password, :rol, :email, :telefono, :estado, :fecha_registro)");
            $stmt->execute([
                ':nombre' => $usuario->getNombre(),
                ':apellidos' => $usuario->getApellidos(),
                ':password' => $usuario->getPassword(),
                ':rol' => $usuario->getRol(),
                ':email' => $usuario->getEmail(),
                ':telefono' => $usuario->getTelefono(),
                ':estado' => $usuario->getEstado(),
                ':fecha_registro' => date('Y-m-d H:i:s'),
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error al crear el usuario: " . $e->getMessage());
        }
    }

    public function buscarUsuario(int $id): Usuario {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                throw new Exception("Usuario no encontrado.");
            }

            $usuario = new Usuario($data['nombre'], $data['apellidos'], $data['password'], $data['id']);
            $usuario->setRol($data['rol']);
            $usuario->setEmail($data['email']);
            $usuario->setTelefono($data['telefono']);
            $usuario->setEstado($data['estado']);
            $usuario->setFechaRegistro($data['fecha_registro']);

            return $usuario;
        } catch (PDOException $e) {
            throw new Exception("Error al buscar el usuario: " . $e->getMessage());
        }
    }

    public function editarUsuario(UsuarioModel $usuarioModel) {
        try {
            $stmt = $this->pdo->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, password = :password, rol = :rol, email = :email, telefono = :telefono, estado = :estado WHERE id = :id");
            $stmt->execute([
                ':id' => $usuario->getId(),
                ':nombre' => $usuario->getNombre(),
                ':apellidos' => $usuario->getApellidos(),
                ':password' => $usuario->getPassword(),
                ':rol' => $usuario->getRol(),
                ':email' => $usuario->getEmail(),
                ':telefono' => $usuario->getTelefono(),
                ':estado' => $usuario->getEstado(),
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error al editar el usuario: " . $e->getMessage());
        }
    }

    public function eliminarUsuario(int $id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id]);

            if ($stmt->rowCount() === 0) {
                throw new Exception("Usuario no encontrado o ya eliminado.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar el usuario: " . $e->getMessage());
        }
    }

    public function listarUsuarios(): array {
        try {
            $stmt = $this->pdo->query("SELECT * FROM usuarios");
            $usuarios = [];
            
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario($data['nombre'], $data['apellidos'], $data['password'], $data['id']);
                $usuario->setRol($data['rol']);
                $usuario->setEmail($data['email']);
                $usuario->setTelefono($data['telefono']);
                $usuario->setEstado($data['estado']);
                $usuario->setFechaRegistro($data['fecha_registro']);
                $usuarios[] = $usuario;
            }

            return $usuarios;
        } catch (PDOException $e) {
            throw new Exception("Error al listar los usuarios: " . $e->getMessage());
        }
    }
}

