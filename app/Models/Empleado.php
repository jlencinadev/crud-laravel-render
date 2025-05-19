<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'dni', 'departamento_id'];

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
}