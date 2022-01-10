<?php

use App\Models\EmpresaModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string("login")->unique();
            $table->string("nome");
            $table->string("cpf")->unique();
            $table->string("email");
            $table->string("endereco");
            $table->string("senha");
            $table->bigInteger("empresa_model_id")->unsigned()->references('id')->on("empresas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
