<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nome', 'cpf', 'data_nascimento', 'email'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'data_nascimento' => 'datetime',
        ];
    }

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    public function getMaskedCpfAttribute($cpf)
    {
        return Str::of($cpf)->replaceMatches(
            pattern: '/(\d{3})(\d{3})(\d{3})(\d{2})/',
            replace: '***.$2.$3-***',
        );
    }

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request->id, function (Builder $query, string $id) {
            return $query->where('id', $id);
        })
            ->when($request->nome, function (Builder $query, string $nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            })
            ->when($request->cpf, function (Builder $query, string $cpf) {
                return $query->where('cpf', 'like', '%' . $cpf . '%');
            });
    }
}
