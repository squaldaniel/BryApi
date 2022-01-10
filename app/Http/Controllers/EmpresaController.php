<?php

namespace App\Http\Controllers;

use App\Models\EmpresaModel;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = new EmpresaModel;
        return $empresas->with("FuncionarioModel")->with("ClienteModel")->get()->toArray();
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
        return EmpresaModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresaModel  $empresaModel
     * @return \Illuminate\Http\Response
     
    public function show(EmpresaModel $empresaModel)
    {
        return EmpresaModel::all();
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaModel  $empresaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaModel $empresaModel)
    {
        //return $empresaModel->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaModel  $empresaModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, EmpresaModel $empresaModel)
    {
        if($empresaModel->find($id)){
            $empresa = EmpresaModel::find($id);
            $empresa->update($request->all());
            return $empresa;
        } else {
            return response()->json(["Message"=>"Empresa não existente"], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaModel  $empresaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, EmpresaModel $empresaModel)
    {
        if($empresaModel->find($id)){
            $empresa = EmpresaModel::find($id);
            $empresa->delete();
            return response()->json(["Message"=>"Empresa deletada com sucesso"], 200);
        } else {
            return response()->json(["Message"=>"Id de Empresa não existente"], 404);
        };
    }
}
