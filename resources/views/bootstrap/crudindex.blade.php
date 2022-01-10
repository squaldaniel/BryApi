@extends("bootstrap.model")
@section("body")
<div class="container">
    @include("bootstrap.menuheader")
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Empresas</th>
            <th scope="col">Funcionarios</th>
            <th scope="col">Clientes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>{{$dados[0]->empresas}}</td>
            <td>{{$dados[0]->funcionarios}}</td>
            <td>{{$dados[0]->clientes}}</td>
          </tr>
        </tbody>
      </table>
</div>
<div class="row container d-flex flex-wrap justify-content-center">




</div>
@endsection
