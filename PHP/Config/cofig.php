<?php

function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    return $datos;
}