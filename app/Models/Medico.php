<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'crm',
        'especialidade'
    ];

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request->id, function (Builder $query, string $id) {
            return $query->where('id', $id);
        })
            ->when($request->nome, function (Builder $query, string $nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            })
            ->when($request->crm, function (Builder $query, string $crm) {
                return $query->where('crm', 'like', '%' . $crm . '%');
            })->when($request->especialidade, function (Builder $query, string $especialidade) {
                return $query->where('especialidade', 'like', '%' . $especialidade . '%');
            });
    }
}
