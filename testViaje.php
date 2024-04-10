<?php
require_once 'Viaje.php';

echo "Bienvenido al sistema de gestión de viajes\n";


$numeroEmpleado = readline("Ingrese el número de empleado del responsable: ");
$numeroLicencia = readline("Ingrese el número de licencia del responsable: ");
$nombreResponsable = readline("Ingrese el nombre del responsable: ");
$apellidoResponsable = readline("Ingrese el apellido del responsable: ");

$responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombreResponsable, $apellidoResponsable);


$codigo = readline("Ingrese el código del viaje: ");
$destino = readline("Ingrese el destino del viaje: ");
$cantidadMaximaPasajeros = readline("Ingrese la cantidad máxima de pasajeros: ");


$viaje = new Viaje($codigo, $destino, $cantidadMaximaPasajeros, $responsable);

do {
    echo "1. Agregar pasajero\n";
    echo "2. Modificar pasajero\n";
    echo "3. Ver datos del viaje\n";
    echo "4. Salir\n";

    $opcion = readline("Ingrese la opción deseada: ");

    switch ($opcion) {
        case '1':
            $nombrePasajero = readline("Ingrese el nombre del pasajero: ");
            $apellidoPasajero = readline("Ingrese el apellido del pasajero: ");
            $dniPasajero = readline("Ingrese el DNI del pasajero: ");
            $telefonoPasajero = readline("Ingrese el teléfono del pasajero: ");
            if ($viaje->agregarPasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero)) {
                echo "Pasajero agregado correctamente.\n";
            } else {
                echo "No se puede agregar más pasajeros, se ha alcanzado la cantidad máxima o el pasajero ya está en el viaje.\n";
            }
            break;

        case '2':
            $dniPasajero = readline("Ingrese el DNI del pasajero a modificar: ");
            $nombrePasajero = readline("Ingrese el nuevo nombre del pasajero: ");
            $apellidoPasajero = readline("Ingrese el nuevo apellido del pasajero: ");
            $telefonoPasajero = readline("Ingrese el nuevo teléfono del pasajero: ");
            if ($viaje->modificarPasajero($dniPasajero, $nombrePasajero, $apellidoPasajero, $telefonoPasajero)) {
                echo "Pasajero modificado correctamente.\n";
            } else {
                echo "No se encontró al pasajero con el DNI dado.\n";
            }
            break;

        case '3':
            echo "Código del viaje: " . $viaje->getCodigo() . "\n";
            echo "Destino del viaje: " . $viaje->getDestino() . "\n";
            echo "Cantidad máxima de pasajeros: " . $viaje->getCantidadMaximaPasajeros() . "\n";
            echo "Responsable del viaje:\n";
            echo "Número de empleado: " . $viaje->getResponsable()->getNumeroEmpleado() . "\n";
            echo "Número de licencia: " . $viaje->getResponsable()->getNumeroLicencia() . "\n";
            echo "Nombre: " . $viaje->getResponsable()->getNombre() . "\n";
            echo "Apellido: " . $viaje->getResponsable()->getApellido() . "\n";

            echo "Pasajeros del viaje:\n";
            foreach ($viaje->getPasajeros() as $pasajero) {
                echo "Nombre: " . $pasajero->getNombre() . "\n";
                echo "Apellido: " . $pasajero->getApellido() . "\n";
                echo "DNI: " . $pasajero->getDni() . "\n";
                echo "Teléfono: " . $pasajero->getTelefono() . "\n";
            }
            break;

        case '4':
            exit("¡Hasta luego!\n");

        default:
            echo "Opción no válida. Por favor, seleccione una opción válida.\n";
            break;
    }
} while ($opcion != '4');
