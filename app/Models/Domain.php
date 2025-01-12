<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', // Ajoutez d'autres champs nécessaires
    ];

    // Définir la relation inverse avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
?>