<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'second_name',
        'email',
        'photo',
        'random_id',
        'type_id',
        'status_id',
    ];
}
