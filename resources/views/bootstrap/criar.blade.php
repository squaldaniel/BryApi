<?php
$empresas = App\Models\EmpresaModel::all()->toArray();
?>
@extends("bootstrap.model")
@section("body")
<div class="container">

    @include("bootstrap.menuheader")
    @switch($model)
        @case("empresa")
                <form action="/criar/empresa" method="POST">
                    @csrf
                <input type="hidden" name="tipomodel" value="{{$model}}">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome Empresa :</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nomeempresa" id="nomeempresa" required>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">CNPJ :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="cnpj" id="cnpj" required>
                      </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Endereço : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="endereco" id="endereco" required>
                    </div>
                </div>
                <div class="mb-8 row">
                      <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                </form>
            @break
            @case("funcionario")
                <form action="/criar/funcionario" method="POST">
                    @csrf
                    <input type="hidden" name="tipomodel" value="{{$model}}">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome Funcionário :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Login :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">E-mail :</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">CPF :</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cpf" id="cpf" required>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Senha :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" id="senha" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Endereço :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="endereco" id="endereco" required>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Empresa :</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="empresa" id="empresa">
                            @foreach ($empresas as $k=>$v)
                                <option value="{{$v["id"]}}">{{$v["nome"]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-8 row">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                </form>
            @break
            @case("cliente")
            <form action="/criar/cliente" method="POST">
                @csrf
                <input type="hidden" name="tipomodel" value="{{$model}}" required>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome Cliente :</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="nome" id="nome" required>
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Login :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-1 col-form-label">E-mail :</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">CPF :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="cpf" id="cpf" required>
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Senha :</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Endereço :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="endereco" id="endereco" required>
                </div>
                <label for="staticEmail" class="col-sm-1 col-form-label">Empresa :</label>
                <div class="col-sm-4">
                    <select class="form-select" name="empresa" id="empresa">
                        @foreach ($empresas as $k=>$v)
                            <option value="{{$v["id"]}}">{{$v["nome"]}}</option>
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
