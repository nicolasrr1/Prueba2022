<?php

$conexion = new mysqli('localhost', 'root', '', 'gc_equipos');



    $conexion->set_charset("utf8");
    $statement = $conexion->prepare("SELECT * FROM gce_caracteristicas");
    $statement->execute();
    $resultados = $statement->get_result();
    if ($resultados->num_rows > 0) {
        echo "        <table class='table'>
        <thead>
            <tr>
                <th scope='col'>Nombre del equipo</th>
                <th scope='col'>Tipo de placa base</th>
                <Modelo scope='col'>Modelo de la torre</th>
                <th scope='col'>caso</th>
                <th scope='col'>Marca del procesador</th>
                <th scope='col'>Marca de la trajeta gráfica</th>
                <th scope='col'>Tamaño total de ram</th>
                <th scope='col'>Modelo del disco duro</th>
                <th scope='col'>Tipo de teclado</th>
                <th scope='col'> Tipo de mouse</th>
                <th scope='col'>Tamaño total de la pantalla</th>
                <th scope='col'>Actualizar</th>
                <th scope='col'>Estado</th>


            </tr>
        </thead>";
        while($row = $resultados->fetch_assoc()){
          echo "<tr>
          <input type='hidden' id='id' value='".$row["gce_id"]."'>

          <td>".$row["gce_nombre_equipo"]."</td>
          <td>".$row["gce_board"]."</td>
          <td>".$row["gce_case"]."</td>
          <td>".$row["gce_procesador"]."</td>
          <td>".$row["gce_grafica"]."</td>
          <td>".$row["gce_ram"]."</td>
          <td>".$row["gce_disco_duro"]."</td>
          <td>".$row["gce_teclado"]."</td>
          <td>".$row["gce_mouse"]."</td>
          <td>".$row["gce_pantalla"]."</td>
          <td>".$row["gce_estado"] = 1 ? '<button type="button" id="desactivar" class="btn btn-danger">Desactivar</button>' : '<button type="button" id="activar" class="btn btn-success">Activar</button>'  ."</td>
        </tr>
        
        
        
        ";


        
        }
        echo "</table>";
      } else{
        echo "Aún no hay registros";
      }



echo json_encode($resultados->fetch_assoc());
