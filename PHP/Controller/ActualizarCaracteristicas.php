<?php


require './Config/connection.php';
require './Model/GceCaracteristicas.php';

$GceCaracteristicas = new GceCaracteristicas();
$db = conexion();


try {
    if (!$db) {
        echo false;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $gce_nombre_equipo = limpiarDatos($_POST['gce_nombre_equipo']);
        $gce_board = limpiarDatos($_POST['gce_board']);
        $gce_case = limpiarDatos($_POST['gce_case']);
        $gce_procesador = limpiarDatos($_POST['gce_procesador']);
        $gce_grafica = limpiarDatos($_POST['gce_grafica']);
        $gce_ram = limpiarDatos($_POST['gce_ram']);
        $gce_teclado = limpiarDatos($_POST['gce_teclado']);
        $gce_mouse = limpiarDatos($_POST['gce_mouse']);
        $gce_pantalla = limpiarDatos($_POST['gce_pantalla']);

        if (
            isset($gce_nombre_equipo) && isset($gce_board) && isset($gce_case) && isset($gce_procesador)
            && isset($gce_grafica) && isset($gce_ram) && isset($gce_teclado) && isset($gce_mouse)  && isset($gce_pantalla)
        ) {
            $GceCaracteristicas->updateGceCaracteristicas($db, $gce_nombre_equipo, $gce_board, $gce_case, $gce_procesador, $gce_grafica, $gce_ram, $gce_teclado, $gce_mouse, $gce_pantalla,$gce_estado);
            echo true;
        } else {
            echo false;
        }
    }
} catch (\Throwable $th) {
    echo $th;
}
