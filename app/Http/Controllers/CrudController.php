<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use App\Models\EmpresaModel;
use App\Models\FuncionarioModel;
use DB;
use Illuminate\Support\Facades\Redirect;

class CrudController extends Controller
{
    public function index ()
        {
            $db = DB::select(DB::raw("select count(distinct(A.id)) as empresas,
            count(distinct(B.id)) as funcionarios,
            count(distinct(C.id)) as clientes
            from empresas A, funcionarios B, clientes C;"));
            return view("bootstrap.crudindex")->with(["dados"=>$db]);
        }
    public function empresaslist()
        {
            $empresas = EmpresaModel::all()->toArray();
            return view("bootstrap.empresalist")->with(["empresas"=>$empresas, "model"=>"empresa"]);
        }
    public function funcionarioslist()
        {
            $funcionarios = FuncionarioModel::all()->toArray();
            return view("bootstrap.funcionariolist")->with(["funcionarios"=>$funcionarios, "model"=>"funcionario"]);
        }
    public function clienteslist()
        {
            $clientes = ClienteModel::all()->toArray();
            return view("bootstrap.clientelist")->with(["clientes"=>$clientes, "model"=>"cliente"]);
        }
    public function actionModel($action, $id, $model)
        {
            switch($model){
                case "empresa":
                    $model = EmpresaModel::find($id);
                break;
                case "funcionario":
                    $model = FuncionarioModel::find($id);
                break;
                case "cliente":
                    $model = ClienteModel::find($id);
                    break;
            }
            switch($action)
                {
                    case "delete":
                        $model->delete();
                        return redirect(url()->previous());
                    break;
                    case "edit":
                        $view = "bootstrap.edit";
                        return view($view)->with(["model"=>$model]);
                    break;
                    case "criar":
                        $view = "bootstrap.criar";
                        return view($view)->with(["model"=>$id]);
                    break;
                };
        }
    public function updateModel($model, $id)
        {
            switch($model){
                case "empresa":
                    EmpresaModel::where("id", $id)->update([
                        "nome"=>$_POST["nomeempresa"],
                        "cnpj"=>$_POST["cnpj"],
                        "endereco"=>$_POST["endereco"]
                    ]);
                    return Redirect::to("/crudempresas");
                break;
                case "funcionario":
                    FuncionarioModel::where("id", $id)->update([
                        "login"=>$_POST["login"],
                        "nome"=> $_POST["nome"],
                        "cpf"=>$_POST["cpf"],
                        "email"=>$_POST["email"],
                        "endereco"=>$_POST["endereco"],
                        "senha"=>$_POST["senha"]
                    ]);
                    return Redirect::to("/crudfuncionarios");
                break;
                case "cliente":
                    ClienteModel::where("id", $id)->update([
                        "login"=>$_POST["login"],
                        "nome"=> $_POST["nome"],
                        "cpf"=>$_POST["cpf"],
                        "email"=>$_POST["email"],
                        "endereco"=>$_POST["endereco"],
                        "senha"=>$_POST["senha"]
                    ]);
                    return Redirect::to("/crudclientes");
                break;
            }

        }
    public function criarModel(Request $request)
        {
            $dados =  $request->input();
            switch($dados["tipomodel"]){
                case "funcionario":
                    FuncionarioModel::create([
                        "login"=>$_POST["login"],
                        "nome"=>$_POST["nome"],
                        "cpf"=>$_POST["cpf"],
                        "email"=>$_POST["email"],
                        "endereco"=>$_POST["endereco"],
                        "senha"=>$_POST["senha"],
                        "empresa_model_id"=>$_POST["empresa"]
                    ]);
                    return Redirect::to("/crudfuncionarios");
                break;
                case "cliente":
                    ClienteModel::create([
                        "login"=>$dados["login"],
                        "nome"=>$dados["nome"],
                        "cpf"=>$dados["cpf"],
                        "email"=>$dados["email"],
                        "endereco"=>$dados["endereco"],
                        "senha"=>$dados["senha"],
                        "empresa_model_id"=>$dados["empresa"],
                    ]);
                    return Redirect::to("/crudclientes");
                break;
                case "empresa":
                    EmpresaModel::create([
                        "nome"=>$dados["nomeempresa"],
                        "cnpj"=>$dados["cnpj"],
                        "endereco"=>$dados["endereco"]
                    ]);
                    return Redirect::to("/crudempresas");
                break;
            }
        }
}
