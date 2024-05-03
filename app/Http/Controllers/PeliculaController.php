<?php

namespace App\Http\Controllers;

use App\pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelicula::all();
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
        $pelicula = new Pelicula;
        $pelicula->nombre = $request->nombre;
        $pelicula->clasificacion = $request->clasificacion;
        $pelicula->lanzamiento = $request->lanzamiento;
        $pelicula->resena = $request->resena;
        $pelicula->temporada = $request->temporada ? $request->temporada : null;

        $pelicula->save();

        return response()->json(
            [
                "message" => "Operación realizada con éxito",
                "data" => $pelicula
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pelicula::where('id', $id)->first();

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
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pelicula = Pelicula::where('id', $id)->first();
        if ($pelicula) {
            $pelicula->nombre = $request->nombre ? $request->nombre : $pelicula->nombre;
            $pelicula->clasificacion = $request->clasificacion ? $request->clasificacion : $pelicula->clasificacion;
            $pelicula->lanzamiento = $request->lanzamiento ? $request->lanzamiento : $pelicula->lanzamiento;
            $pelicula->resena = $request->resena ? $request->resena : $pelicula->resena;
            $pelicula->temporada = $request->temporada ? $request->temporada : $pelicula->temporada;

            $pelicula->save();
            return response()->json(
                [
                    "message" => "Operación realizada con éxito",
                    "data" => $pelicula
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
     * @param  \App\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pelicula::where('id', $id)->first();

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
