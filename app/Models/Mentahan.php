<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentahan extends Model
{
    use HasFactory;

    protected $table = 'mentahan';
    protected $primaryKey = 'id_mentahan';
    protected $guarded = [];
}