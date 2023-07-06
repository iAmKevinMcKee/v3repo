<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    public function propertyContacts(): BelongsToMany
    {
        return $this->belongsToMany(PropertyContact::class);
    }
}
