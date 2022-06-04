<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    protected $table = 'birth_certificates';
    protected $fillable = ['serial', 'name', 'owner', 'type_livestock', 'race', 'date_birth', 'sex', 'color', 'next_visit'];


    public function livestock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Livestock::class, 'owner');
    }

    public function serialDog(): string
    {
        $serial = (int) substr($this->serial, 1);

        return 'D' . ($serial + 1);
    }

    public function serialCat(): string
    {
        $serial = (int) substr($this->serial, 1);

        return 'C' . ($serial + 1);
    }
}
