<?php

namespace App\Http\Controllers;

use App\personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Personaje::all();
        return response()->json(
            [
                "message" => "Operación realizada con éxito",
                "data" => $data
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personaje = new Personaje;
        $personaje->nombre = $request->nombre;
        $personaje->pelicula = $request->pelicula;
        $personaje->imagen = $request->imagen;
        $personaje->descripcion = $request->descripcion;

        $personaje->save();

        return response()->json(
            [
                "message" => "Operación realizada con éxito",
                "data" => $personaje
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Personaje::where('id', $id)->first();

        if ($data) {
            return response()->json(
                [
                    "message" => "Operación realizada con éxito",
                    "data" => $data
                ]
            );
        }

        return response()->json(
            [
                "message" => "No se encontro el elemento con id=" . $id,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $personaje = Personaje::where('id', $id)->first();
        if ($personaje) {
            $personaje->nombre = $request->nombre ? $request->nombre : $personaje->nombre;
            $personaje->pelicula = $request->pelicula ? $request->pelicula : $personaje->pelicula;
            $personaje->imagen = $request->imagen ? $request->imagen : $personaje->imagen;
            $personaje->descripcion = $request->descripcion ? $request->descripcion : $personaje->descripcion;

            $personaje->save();
            return response()->json(
                [
                    "message" => "Operación realizada con éxito",
                    "data" => $personaje
                ]
            );
        }
        return response()->json(
            [
                "message" => "No se encontro el elemento con id=" . $id,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personaje  $personaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Personaje::where('id', $id)->first();

        if ($data) {
            $data->delete();
            return response()->json(
                [
                    "message" => "Operación realizada con éxito"
                ]
            );
        }

        return response()->json(
            [
                "message" => "No se encontro el elemento con id=" . $id,
            ]
        );
    }
}
