<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Atributos asignables en masa.
     *
     * @var list<string>
     */

    protected $fillable = [
        'user_id',
        'scheduled_at',
        'status',
        'notes',
    ];

    //Relaciones
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
