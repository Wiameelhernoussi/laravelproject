<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'user_id', // Ajoutez d'autres champs nécessaires
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}