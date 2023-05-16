<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setengahJadi extends Model
{
    use HasFactory;

    protected $table = 'setengahJadi';
    protected $primaryKey = 'id_setengahJadi';
    protected $guarded = [];
}