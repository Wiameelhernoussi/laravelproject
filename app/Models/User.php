<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_name', 'email', 'password', 'team', 'specialty', 'domain',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function researches()
    {
        return $this->hasMany(Research::class);
    }
    // Définir la relation avec le modèle Domain
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
?>
