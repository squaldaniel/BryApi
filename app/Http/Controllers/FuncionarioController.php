<?php

namespace App\Http\Controllers;

use App\Models\FuncionarioModel;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = new FuncionarioModel;
        return $funcionarios->with("EmpresaModel")->get()->toArray();
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
        return FuncionarioModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuncionarioModel  $funcionarioModel
     * @return \Illuminate\Http\Response
     */
    public function show(FuncionarioModel $funcionarioModel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuncionarioModel  $funcionarioModel
     * @return \Illuminate\Http\Response
     */
    public function edit(FuncionarioModel $funcionarioModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuncionarioModel  $funcionarioModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, FuncionarioModel $funcionarioModel)
    {
        if($funcionarioModel->find($id)){
            $funcionario = FuncionarioModel::find($id);
            $funcionario->update($request->all());
            return $funcionario;
        } else {
            return response()->json(["Message"=>"Funcionário não existente"], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuncionarioModel  $funcionarioModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, FuncionarioModel $funcionarioModel)
    {
        if($funcionarioModel->find($id)){
            $funcionarioModel = FuncionarioModel::find($id);
            $funcionarioModel->delete();
            return response()->json(["Message"=>"Funcionario deletado com sucesso"], 200);
        } else {
            return response()->json(["Message"=>"Id de Funcionario não existente"], 404);
        };
    }
}
