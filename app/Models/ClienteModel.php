<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        "login",
        "nome",
        "cpf",
        "email",
        "endereco",
        "senha",
        "empresa_model_id"
    ];
    public function EmpresaModel()
        {
            return $this->belongsTo(EmpresaModel::class);
        }
}
