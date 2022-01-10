<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionarioModel extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    protected $fillable = [
        "login",
        "nome",
        "cpf",
        "email",
        "endereco",
        "senha",
        "empresa_model_id",
    ];
    public function EmpresaModel()
        {
            return $this->belongsTo(EmpresaModel::class);
        }
}
