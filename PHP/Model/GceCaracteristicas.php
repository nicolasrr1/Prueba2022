<?php

class GceCaracteristicas
{

    // lista de caracteristicas
    public function getGceCaracteristicas($data)
    {
        $data->set_charset("utf8");
        $statement = $data->prepare("SELECT * FROM gce_caracteristicas");
        $statement->execute();
        $resultados = $statement->get_result();
        if ($resultados->num_rows > 0) {
            $tabla = "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nombre del equipo</th>
                    <th scope='col'>Tipo de placa base</th>
                    <th scope='col'Modelo de la torre</th>
                   
                    <th scope='col'>Marca del procesador</th>
                    <th scope='col'>Marca de la trajeta gráfica</th>
                    <th scope='col'>Tamaño total de ram</th>
                    <th scope='col'>Modelo del disco duro</th>
                    <th scope='col'>Tipo de teclado</th>
                    <th scope='col'> Tipo de mouse</th>
                    <th scope='col'>Tamaño total de la pantalla</th>
                    <th scope='col'>Estado</th>
                </tr>
            </thead>";
            while($row = $resultados->fetch_assoc()){
                return "<tr>
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
            </tr>";
            }
            $tabla += "</table>";
          } else{
            $tabla = "Aún no hay registros";
          }
    
        return $tabla;
     }

    //Crear  Caracteristicas
    public function setGceCaracteristicas($data,$gce_nombre_equipo,$gce_board,$gce_case,$gce_procesador,$gce_grafica,$gce_ram,$gce_disco_duro,$gce_teclado,$gce_mouse,$gce_pantalla,$estado) {

        if ($data->connect_errno) {
            $respuesta = ['error' => true];
        } else {
            $statement = $data->prepare("INSERT INTO gce_caracteristicas(gce_nombre_equipo, gce_board, gce_case, gce_procesador, gce_grafica, gce_ram, gce_disco_duro, gce_teclado,gce_mouse,gce_pantalla,gce_estado) VALUES (
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
            $estado)");
            $statement->execute();
            $respuesta = ['error' => false];

            if ($data->affected_rows <= 0) {
                $respuesta = ['error' => true];
            }

            return $respuesta;

        }
    }
    //Cambiar estado  GceCaracteristicas
    public function deleteGceCaracteristicas($data, $id, $gce_estado)
    {

        $satament = $data->prepare(
            "UPDATE gce_caracteristicas SET gce_estado = :gce_estado, WHERE id = :id"
        );


        $satament->execute(array(
            'gce_estado' => $gce_estado,
            'gce_id' => $id
        ));
    }

    //actualizar GceCaracteristicas
    public function updateGceCaracteristicas($data, $gce_nombre_equipo, $gce_board, $gce_case, $gce_procesador, $gce_grafica, $gce_ram, $gce_teclado, $gce_mouse, $gce_pantalla, $gce_estado)
    {
        $satament = $data->prepare(
            "UPDATE gce_caracteristicas SET gce_nombre_equipo = :gce_nombre_equipo,  gce_case=:gce_case,  gce_procesador =:gce_procesador, gce_grafica = :gce_grafica , gce_ram=:gce_ram, gce_teclado=:gce_teclado,gce_mouse =:gce_mouse,gce_pantalla=:gce_pantalla,gce_estado=:gce_estado , WHERE id = :id"
        );

        $satament->execute(array(
            ':gce_nombre_equipo' => $gce_nombre_equipo,
            ':gce_board' => $gce_board,
            ':gce_case' => $gce_case,
            'gce_procesador' => $gce_procesador,
            'gce_grafica' => $gce_grafica,
            'gce_ram' => $gce_ram,
            'gce_teclado' => $gce_teclado,
            'gce_mouse' => $gce_mouse,
            'gce_pantalla' => $gce_pantalla,
            'gce_estado' => $gce_estado
        ));
    }
}
