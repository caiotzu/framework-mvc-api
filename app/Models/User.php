<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    // Campos que o usuário pode alterar
    protected $fillable = [
        'name', 'cep', 'number',
    ];
}
