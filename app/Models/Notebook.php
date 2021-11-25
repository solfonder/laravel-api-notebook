<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected array $fillable = [
        'id', 'full_name', 'company', 'phone', 'email', 'birth', 'image',
    ];

    protected string $table = 'notebook';
}
