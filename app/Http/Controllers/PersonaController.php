<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Persona;
use App\Documentos;
use Illuminate\Support\Facades\Auth;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consumeApi');
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
                $persona = new Persona;
                $persona->nombre = $request->nombre;
                $persona->primer_ap = $request->primer_ap;
                $persona->segundo_ap = $request->segundo_ap;
                $persona->sexo_id = $request->sexo;
                $persona->user_id = Auth::user()->id;
                if ($persona->save()) {
                    foreach ($request->documento as $documento) {
                        $documentos = new Documentos;
                        $documentos->id_documento = $documento;
                        $documentos->id_persona = $persona->id;
                        $documentos->user_id = Auth::user()->id;
                        $documentos->save();
                    }
                }

            DB::commit();
            return response()->json(['response' => 'success', 'status' => 1],200);
        } catch (\PDOException $th) {
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
