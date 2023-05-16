<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetengahJadi extends Model
{
    use HasFactory;

    protected $table = 'SetengahJadi';
    protected $primaryKey = 'id_SetengahJadi';
    protected $guarded = [];
}
