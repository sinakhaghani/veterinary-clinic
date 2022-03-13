<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockTypeLivestock extends Model
{
    use HasFactory;
    protected $table = 'livestock_type_livestock';
    protected $fillable = ['livestock_id', 'type_livestock_id'];
}
