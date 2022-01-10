<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaModel extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        "nome",
        "cnpj",
        "endereco"
    ];
    public function FuncionarioModel()
        {
            return $this->hasMany(FuncionarioModel::class);
        }
    public function ClienteModel()
        {
            return $this->hasMany(ClienteModel::class);
        }
}
