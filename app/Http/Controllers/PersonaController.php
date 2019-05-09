<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Persona;
use App\Documentos;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $documentos = new Documentos;
            $documentos->id_documento = 0;

            if ($documentos->save()) {
                $persona = new Persona;
                $persona->nombre = 0;
                $persona->primer_ap = 0;
                $persona->segundo_ap = 0;
                $persona->sexo = 0;
                $persona->documentos_id = 0;
                $persona->save();
            }
            DB::commit();
            return response()->json(['response' => 'success', 'status' => 1],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['response' => 'success', 'status' => 3, 'error' => $th],200);
        }
        return response()->json(['response' => 'success', 'status' => 2],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
