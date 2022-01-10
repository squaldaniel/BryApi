<?php
?>
@extends("bootstrap.model")
@section("body")
<div class="container">
    @include("bootstrap.menuheader")
    @include("bootstrap.actionbar")
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Empresa</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @php $n = 1; @endphp
            @foreach ($empresas as $k => $v)
            <tr>
                <td scope="col">{{$n}}</td>
                <td scope="col">{{$v["nome"]}}</td>
                <td scope="col">{{$v["cnpj"]}}</td>
                <td scope="col">{{$v["endereco"]}}</td>
                <td scope="col">
                    <a href="/action/delete/{{$v["id"]}}/empresa" class="btn btn-danger" alt="excluir">
                        <span class="fa fa-trash"></span>
                    </a>
                    <a href="/action/edit/{{$v["id"]}}/empresa" class="btn btn-primary" alt="excluir">
                        <span class="fa fa-edit"></span>
                    </a>
                </td>
              </tr>
              @php $n++; @endphp
            @endforeach
        </tbody>
      </table>
</div>
<div class="row container d-flex flex-wrap justify-content-center">




</div>
@endsection
