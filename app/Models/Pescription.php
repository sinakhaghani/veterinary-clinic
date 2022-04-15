<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pescription extends Model
{
    use HasFactory;

    protected $table = 'pescriptions';
    protected $fillable = ['certificate','medicine', 'description'];
}
