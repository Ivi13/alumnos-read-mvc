<?php

require_once __DIR__ . '/Alumno.php';
require_once __DIR__ . '/ConexionBD.php';

class RepositorioAlumnos
{
    private $conexion;

    function __construct()
    {
        $this->conexion = ConexionBD::obtenerConexion();
    }
    function obtenerTodos()
    {
        $sql = "SELECT * FROM alumno ORDER BY fecha_creacion DESC";
        $stmt = $this->conexion->query($sql);

        $alumnos = [];

        // Leemos fila por fila como array asociativo
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

            // Convertimos el array asociativo en objeto Alumno
            $alumnos[] = new Alumno(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['edad'],
                $fila['fecha_creacion']
            );
        }

        return $alumnos;
    }
}
?>