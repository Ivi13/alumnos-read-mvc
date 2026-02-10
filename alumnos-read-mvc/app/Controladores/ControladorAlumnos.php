<?php
// app/Controladores/ControladorAlumnos.php

require_once __DIR__ . '/../Modelos/RepositorioAlumnos.php';

class ControladorAlumnos
{
    private $repositorio;

    function __construct()
    {
        $this->repositorio = new RepositorioAlumnos();
    }

    // LISTAR
    function listar()
    {
        try {
            $alumnos = $this->repositorio->obtenerTodos();
            $this->renderizar('alumnos/listar', ['alumnos' =>$alumnos]);
        } catch (Exception $e) {
            $this->registrarError("LISTAR", $e);
            $this->renderizar('alumnos/listar', [
                'alumnos' => [],
                'error' => 'No se pudieron cargar los alumnos. Revisa errores.log'
            ]);
        }
    }
    
    function renderizar($vista, $datos = [])
    {
        extract($datos);

        $archivoVista = __DIR__ . '/../Vistas/' . $vista . '.php';
        if (!file_exists($archivoVista)) {
            echo "Vista no encontrada: " . $vista;
            return;
        }

        $vistacontenido = $archivoVista;

        require_once __DIR__ . '/../Vistas/Layout.php';
    }

    function registrarError($contexto, $e)
    {
        $rutaLog = __DIR__ . '/../../storage/errores.log';
        $fecha = date('Y-m-d H:i:s');

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . " | " . $e->getFile() . " | " . $e->getLine() . "\n";
        file_put_contents($rutaLog, $linea, FILE_APPEND);
    }
}
?>