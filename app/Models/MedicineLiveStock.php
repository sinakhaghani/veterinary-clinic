<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineLiveStock extends Model
{
    use HasFactory;

    protected $table = 'medicine_live_stock';
    protected $fillable = ['livestock_id', 'medicine_id'];
}
