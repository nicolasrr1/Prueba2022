<?php
require '../Config/connection.php';
require '../Model/GceCaracteristicas.php';
require "../Config/cofig.php";

$GceCaracteristicas = new GceCaracteristicas();
$db = conexion();
$id = 'siss';
$gce_nombre_equipo = limpiarDatos($_POST['gce_nombre_equipo']);
$gce_board = limpiarDatos($_POST['gce_board']);
$gce_case = limpiarDatos($_POST['gce_case']);
$gce_procesador = limpiarDatos($_POST['gce_procesador']);
$gce_grafica = limpiarDatos($_POST['gce_grafica']);
$gce_ram = limpiarDatos($_POST['gce_ram']);
$gce_disco_duro = limpiarDatos($_POST['gce_disco_duro']);
$gce_teclado = limpiarDatos($_POST['gce_teclado']);
$gce_mouse = limpiarDatos($_POST['gce_mouse']);
$gce_pantalla = limpiarDatos($_POST['gce_pantalla']);
$estado = 1;


// valida formulario
function validarDatos(
    $gce_nombre_equipo,
    $gce_board,
    $gce_case,
    $gce_procesador,
    $gce_grafica,
    $gce_ram,
    $gce_disco_duro,
    $gce_teclado,
    $gce_mouse,
    $gce_pantalla,

) {
    if ($gce_nombre_equipo == '') {
        return 0;
    } else if ($gce_board == '') {
        return 0;
    } else if ($gce_case == '') {
        return 0;
    } else if ($gce_procesador == '') {
        return 0;
    } else if ($gce_grafica == '') {
        return 0;
    } else if ($gce_ram == '') {
        return 0;
    } else if ($gce_disco_duro == '') {
        return 0;
    } else if ($gce_teclado == '') {
        return 0;
    } else if ($gce_mouse == '') {
        return 0;
    } else if ($gce_pantalla == '') {
        return 0;
    }
    return 1;
}



if (validarDatos($gce_nombre_equipo,$gce_board,$gce_case,$gce_procesador,$gce_grafica,$gce_ram,$gce_disco_duro,$gce_teclado,$gce_mouse,$gce_pantalla)) {
    $respuesta = $GceCaracteristicas-> setGceCaracteristicas($db,$gce_nombre_equipo,$gce_board,$gce_case,$gce_procesador,$gce_grafica,$gce_ram,$gce_disco_duro,$gce_teclado,$gce_mouse,$gce_pantalla,$estado);
} else {
    $respuesta = ['error' => true];
}


echo json_encode($respuesta);
