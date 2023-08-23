<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';
    protected $fillable = ['owner', 'description'];
    protected $appends = ['date'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function getDateAttribute()
    {
        return  Jalalian::fromCarbon(Carbon::parse($this->attributes['created_at']))->format('H:i - Y-m-d');
    }

    public function livestock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Livestock::class, 'owner');
    }
}
