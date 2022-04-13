<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    protected $fillable = ['serial', 'name', 'owner', 'type_livestock', 'race', 'date_birth', 'sex', 'color'];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'owner');
    }
}
