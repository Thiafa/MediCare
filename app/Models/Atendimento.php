<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $fillable = ['data_atendimento', 'medico_id', 'paciente_id'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'data_atendimento' => 'datetime',
        ];
    }

    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request->id, function (Builder $query, string $id) {
            return $query->where('id', $id);
        })
            ->when($request->medico, function (Builder $query, string $medico) {
                return $query->whereHas('medico', function (Builder $query) use ($medico) {
                    $query->where('nome', 'like', "%$medico%");
                });
            })
            ->when($request->paciente, function (Builder $query, string $paciente) {
                return $query->whereHas('paciente', function (Builder $query) use ($paciente) {
                    $query->where('nome', 'like', "%$paciente%");
                });
            })
            ->when($request->start_date, function (Builder $query, string $start_date) {
                $start_date =  Carbon::createFromFormat('d-m-Y', $start_date)->format('Y-m-d');
                return $query->whereDate('data_atendimento', '>=', $start_date);
            })
            ->when($request->end_date, function (Builder $query, string $end_date) {
                $end_date =  Carbon::createFromFormat('d-m-Y', $end_date)->format('Y-m-d');
                return $query->whereDate('data_atendimento', '<=', $end_date);
            });
    }
}
