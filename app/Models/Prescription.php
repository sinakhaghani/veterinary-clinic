<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';
    protected $fillable = ['certificate','medicine', 'description'];

    public function birthCertificate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BirthCertificate::class, 'certificate');
    }
}
