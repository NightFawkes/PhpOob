<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    public function __construct($nombre, $apellido, $dni, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}

class ResponsableV {
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido) {
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNumeroEmpleado() {
        return $this->numeroEmpleado;
    }

    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function setNumeroLicencia($numeroLicencia) {
        $this->numeroLicencia = $numeroLicencia;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
}

class Viaje {
    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $pasajeros = [];
    private $responsable;

    public function __construct($codigo, $destino, $cantidadMaximaPasajeros, $responsable) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
        $this->responsable = $responsable;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getCantidadMaximaPasajeros() {
        return $this->cantidadMaximaPasajeros;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros) {
        $this->cantidadMaximaPasajeros = $cantidadMaximaPasajeros;
    }

    public function agregarPasajero($nombre, $apellido, $dni, $telefono) {
      
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDni() === $dni) {
                return false; 
            }
        }

        if (count($this->pasajeros) < $this->cantidadMaximaPasajeros) {
            $this->pasajeros[] = new Pasajero($nombre, $apellido, $dni, $telefono);
            return true;
        } else {
            return false; 
        }
    }

    public function modificarPasajero($dni, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDni() === $dni) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                return true;
            }
        }
        return false; 
    }
}