<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestock';
    protected $fillable = ['name', 'mobile', 'type_livestock', 'gender', 'amount', 'address', 'code_verify'];
    protected $appends = ['date'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function getDateAttribute()
    {
        return  Jalalian::fromCarbon(Carbon::parse($this->attributes['created_at']))->format('Y-m-d');
    }
}
