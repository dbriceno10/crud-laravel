<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //Especificamos que variables se pueden asignar de manera masiva como tema de seguridad
    protected $fillable = ['title', 'description', 'due_date', 'status'];
}
