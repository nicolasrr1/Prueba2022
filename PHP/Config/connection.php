<?php
// conexion de base de datos
function conexion()
{
    try {
        $conexion = new mysqli('localhost', 'root', '', 'gc_equipos');
        return $conexion;
    } catch (PDOException) {
        return false;
    }
}
