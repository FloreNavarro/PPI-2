<?php

// Activar reporte de errores
error_reporting(E_ALL);

// Conexión a la base de datos usando MySQLi
$host = 'localhost';
$user = 'root';
$pass = 'mysql';
$db = 'registropetshop';

// Crear conexión
$enlace = mysqli_connect($host, $user, $pass, $db);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
    echo "Conexión Exitosa";
}

// Verificar si se envió el formulario
if (isset($_POST['Registro'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($enlace, $_POST['apellido']);
    $celular = mysqli_real_escape_string($enlace, $_POST['celular']);
    $consulta = mysqli_real_escape_string($enlace, $_POST['consulta']);
    $dia_reserva = mysqli_real_escape_string($enlace, $_POST['dia_reserva']);

    // Preparar consulta SQL para insertar los datos
    $insertarDatos = "INSERT INTO persona (nombre, apellido, celular, consulta, dia_reserva) 
                      VALUES ('$nombre', '$apellido', '$celular', '$consulta', '$dia_reserva')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    // Verificar si la inserción fue exitosa
    if ($ejecutarInsertar) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . mysqli_error($enlace);
    }
}

// Cerrar la conexión
mysqli_close($enlace);

?>
