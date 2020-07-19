<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    // Campos que o usuário pode alterar
    protected $fillable = [
        'name', 'descricao', 'age', 'users_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
