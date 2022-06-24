<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

/**
 * Class Referred
 * @package App\Models
 */
class Referred extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'referred';
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'owner', 'amount'];

    /**
     * @var string[]
     */
    protected $appends = ['date'];

    /**
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function livestock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Livestock::class, 'owner');
    }

    /**
     * @return string
     */
    public function getDateAttribute()
    {
        return  Jalalian::fromCarbon(Carbon::parse($this->attributes['created_at']))->format('H:i:s - Y/m/d');
    }
}
