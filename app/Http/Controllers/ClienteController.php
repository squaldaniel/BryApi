<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use Illuminate\Http\Request;
use App\Models\EmpresaModel;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = new ClienteModel;
        return $clientes->with("EmpresaModel")->get()->toArray();
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
        return ClienteModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteModel $clienteModel)
    {
        $clientes = new ClienteModel;
        return $clientes->with("EmpresaModel")->get()->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteModel $clienteModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ClienteModel $clienteModel)
    {
        if($clienteModel->find($id)){
            $cliente = ClienteModel::find($id);
            $cliente->update($request->all());
            return $cliente;
        } else {
            return response()->json(["Message"=>"Cliente não existente"], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ClienteModel $clienteModel)
    {
        if($clienteModel->find($id)){
            $clienteModel = ClienteModel::find($id);
            $clienteModel->delete();
            return response()->json(["Message"=>"Cliente deletado com sucesso"], 200);
        } else {
            return response()->json(["Message"=>"Id de Cliente não existente"], 404);
        };
    }
}
