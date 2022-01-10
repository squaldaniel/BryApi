<?php
$typemodel = str_replace('Model', '', str_replace('App\\Models\\', '',  get_class($model)) );
$dados = $model->toArray();
$empresas = App\Models\EmpresaModel::all()->toArray();
?>
@extends("bootstrap.model")
@section("body")
<div class="container">

    @include("bootstrap.menuheader")
    @switch($typemodel)
        @case("Empresa")
                <form action="/update/empresa/{{$dados["id"]}}" method="POST">
                    @csrf
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome Empresa :</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nomeempresa" id="nomeempresa" value="{{$dados["nome"]}}">
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">CNPJ :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{$dados["cnpj"]}}">
                      </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Endereço : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="endereco" id="endereco" value="{{$dados["endereco"]}}">
                    </div>
                </div>
                <div class="mb-8 row">
                      <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                </form>
            @break
            @case("Funcionario")
                <form action="/update/funcionario/{{$dados["id"]}}" method="POST">
                    @csrf
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome Funcionário :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nome" id="nome" value="{{$dados["nome"]}}">
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Login :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="login" id="login" value="{{$dados["login"]}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">E-mail :</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" id="email" value="{{$dados["email"]}}">
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">CPF :</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cpf" id="cpf" value="{{$dados["cpf"]}}">
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Senha :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" id="senha" value="{{$dados["senha"]}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Endereço :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="endereco" id="endereco" value="{{$dados["endereco"]}}">
                    </div>
                </div>
                <div class="mb-8 row">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                </form>
            @break
            @case("Cliente")
            <form action="/update/cliente/{{$dados["id"]}}" method="POST">
                @csrf
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome Cliente :</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="nome" id="nome" value="{{$dados["nome"]}}">
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Login :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="login" id="login" value="{{$dados["login"]}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-1 col-form-label">E-mail :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="email" id="email" value="{{$dados["email"]}}">
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">CPF :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{$dados["cpf"]}}">
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Senha :</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="senha" id="senha" value="{{$dados["senha"]}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Endereço :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{$dados["endereco"]}}">
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Empresa :</label>
                <div class="col-sm-4">
                    <select class="form-select" name="empresa" id="empresa">
                        @foreach ($empresas as $k=>$v)
                            @if($dados["empresa_model_id"]==$v["id"])
                                <option value="{{$v["id"]}}" selected>{{$v["nome"]}}</option>
                            @else
                                <option value="{{$v["id"]}}" selected>{{$v["nome"]}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-8 row">
                <input type="submit" class="btn btn-primary" value="Atualizar">
            </div>
            </form>
        @break

        @default
    @endswitch
</div>
@endsection
