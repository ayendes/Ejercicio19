<?php

class Usuario{
   private $id; 
   private $password; 
   private $nombre; 
   private $apellidos; 
   private $rol; 
   private $email; 
   private $telefono; 
   private $estado; 
   private $fecha_registro; 

   //Constructores
   public function __construct(String $nombre, String $apellidos, String $password, int $id = null) {
    
    // Validar los datos de los campos "nombre", "apellido", "password"
    if(empty(trim ($nombre))){
        throw new InvalidArgumentException ("nombre es requerido");

    } if (empty(trim ($apellidos))){
        throw new InvalidArgumentException ("apellido es requerido");
    }
    // Verifica que la password no esté vacía
    if (empty(trim ($password))) {
        throw new InvalidArgumentException ("password es requerido.");
    }
    // Verifica la longitud de la password
    if (strlen($password) < 8 || strlen($password) > 12) {
        throw new InvalidArgumentExceptio ("Password debe tener entre 8 y 12 caracteres.");
    }
    

    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->password = password_hash($password, PASSWORD_DEFAULT); // Encriptar contraseña

}

    // Métodos Getters

    public function getId() { 
        return $this->id; 
    }

    public function getPassword() { 
        return $this->password; 
    } 

    public function getNombre() { 
        return $this->nombre; 
    } 

    public function getApellidos() { 
        return $this->apellidos; 
    } 

    public function getRol() { 
        return $this->rol; 
    } 

    public function getEmail() { 
        return $this->email; 
    } 

    public function getTelefono() { 
        return $this->telefono; 
    } 

    public function getEstado() { 
        return $this->estado; 
    } 

    public function getFechaRegistro() { 
        return $this->fecha_registro; 
    } 
        
    // Métodos Setters 

    public function setRol($rol) { 
        $this->rol = $rol; 
    } 
    public function setEmail($email) { 
        $this->email = $email; 
    } 
    public function setTelefono($telefono) { 
        $this->telefono = $telefono; 
    } 
    public function setEstado($estado) { 
        $this->estado = $estado; 
    } 
    public function setFechaRegistro($fecha_registro) { 
        $this->fecha_registro = $fecha_registro; 
    } 
            
}
    

        