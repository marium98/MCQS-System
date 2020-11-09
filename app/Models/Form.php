<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    
    public $table = 'form';

   

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'name',
        'email',
        'contact',
        'message',
    ];
}
