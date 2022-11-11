<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GceCaracteristicas;
use DB, Validator;

class GceCaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return $Caracteristicas
     */

    //lista de Caracteristicas
    public function index()
    {
        $Caracteristicas = GceCaracteristicas::all();
        return response()->json($Caracteristicas);
    }
    //lista de Caracteristicas por id
    public function indexById($id)
    {
        $Caracteristicas = GceCaracteristicas::all()->where('gce_id',  $id);
        return response()->json($Caracteristicas);
    }

    /**
     * @param Request
     * return true o error
     */


    

    // almacenar características 
    public function storage(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'board'  => 'required',
                'case'  => 'required',
                'procesador'  => 'required',
                'grafica'  => 'required',
                'ram'  => 'required',
                'disco'  => 'required',
                'teclado'  => 'required',
                'mouse' => 'required',
                'pantalla' => 'required',
            ], [
                'required' => 'El campo :attribute es requerido.',

            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            } else {
                $caracteristicas = new GceCaracteristicas();

                $caracteristicas->gce_nombre_equipo = $request->name;
                $caracteristicas->gce_board = $request->board;
                $caracteristicas->gce_case = $request->case;
                $caracteristicas->gce_procesador = $request->procesador;
                $caracteristicas->gce_grafica = $request->grafica;
                $caracteristicas->gce_ram = $request->ram;
                $caracteristicas->gce_disco_duro = $request->disco;
                $caracteristicas->gce_teclado = $request->teclado;
                $caracteristicas->gce_mouse = $request->mouse;
                $caracteristicas->gce_pantalla = $request->pantalla;

                $caracteristicas->save();

                return true;
            }
        } catch (Exception $e) {
            return  response()->json($e);
        }
    }

    /**
     * @param Request
     * return true o error
     */
    //actualizar datos  GceCaracteristicas
    function update(Request $request)
    {


        try {
            $validate = Validator::make($request->all(), [
                'id'  => 'required',
                'name' => 'required',
                'board'  => 'required',
                'case'  => 'required',
                'procesador'  => 'required',
                'grafica'  => 'required',
                'ram'  => 'required',
                'disco'  => 'required',
                'teclado'  => 'required',
                'mouse' => 'required',
                'pantalla' => 'required',
                'estado' => 'required',
            ], [
                'required' => 'El campo :attribute es requerido.',
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            } else {
                $caracteristicas = new GceCaracteristicas();
                $id = $request->id;
                $gce_nombre_equipo = $request->name;
                $gce_board = $request->board;
                $gce_case = $request->case;
                $gce_procesador = $request->procesador;
                $gce_grafica = $request->grafica;
                $gce_ram = $request->ram;
                $gce_disco_duro = $request->disco;
                $gce_teclado = $request->teclado;
                $gce_mouse = $request->mouse;
                $gce_pantalla = $request->pantalla;
                $gce_estado = $request->estado;
                $affected = DB::table('gce_caracteristicas')
                    ->where('gce_id',  $id)
                    ->update([
                        'gce_nombre_equipo' => $gce_nombre_equipo,
                        'gce_board' => $gce_board,
                        'gce_case' => $gce_case,
                        'gce_procesador' => $gce_procesador,
                        'gce_grafica' => $gce_grafica,
                        'gce_ram' => $gce_ram,
                        'gce_disco_duro' => $gce_disco_duro,
                        'gce_teclado' => $gce_teclado,
                        'gce_mouse' => $gce_mouse,
                        'gce_pantalla' => $gce_pantalla,
                        'gce_estado' => $gce_estado
                    ]);
            }
            return true;
        } catch (Exception $e) {

            return  response()->json($e);
        }
    }

    /**
     * @param int $id
     * return true  o error
     */
    //cambiar estado 

    function cambiarEstado($id)
    {
        try {
            $data = $this->cargarEstado($id);

            if ($data) {
                DB::table('gce_caracteristicas')
                    ->where('gce_id',  $id)
                    ->update([
                        'gce_estado' => 0
                    ]);
            } else {
                DB::table('gce_caracteristicas')
                    ->where('gce_id',  $id)
                    ->update([
                        'gce_estado' => 1
                    ]);
            }



            return true;
        } catch (Exception $e) {

            return  response()->json($e);
        }
    }
 

    /**
     * @param int $id
     * return $estado o error
     */
    //selecciona el estado de la característica 
    function cargarEstado($id)
    {
        try {
            $Caracteristicas = GceCaracteristicas::where('gce_id', $id)->first();
            if ($Caracteristicas->gce_estado == 1) {
                $estado = true;
            } else {
                $estado = false;
            }
            return $estado;
        } catch (Exception $e) {
            return  response()->json($e);
        }
    }

    // eliminar
    function delete($id)
    {
        try {
            $Caracteristicas = GceCaracteristicas::where('gce_id', $id)->first();
            if ($Caracteristicas->gce_estado == 1) {
                $estado = true;
            } else {
                $estado = false;
            }
            return $estado;
        } catch (Exception $e) {
            return  response()->json($e);
        }
    }
}
