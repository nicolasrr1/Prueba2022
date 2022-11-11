<?php

require './Config/connection.php';
require './Model/GceCaracteristicas.php';

$GceCaracteristicas = new GceCaracteristicas();

try {
    if (!$db) {
        echo false;

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $gce_estado = limpiarDatos($_POST['gce_estado']);
        $id = limpiarDatos($_POST['id']);
      

        if (
            isset($id) && isset($gce_estado) 
        ) {
            $GceCaracteristicas->deleteGceCaracteristicas($db, $id, $gce_estado);
            echo true;
        } else {
            echo false;
        }
    }
} catch (\Throwable $th) {
    echo $th;
}
