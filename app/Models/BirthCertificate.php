<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    protected $table = 'birth_certificates';
    protected $fillable = ['name', 'owner', 'type_livestock', 'race', 'date_birth', 'sex', 'color'];

    public function livestock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Livestock::class, 'owner');
    }
}
