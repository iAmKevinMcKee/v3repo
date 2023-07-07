<?php

namespace App\Models;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function propertyContacts(): BelongsToMany
    {
        return $this->belongsToMany(PropertyContact::class);
    }

    public function supportContacts(): HasMany
    {
        return $this->hasMany(SupportContact::class);
    }

    public static function getForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            SpatieMediaLibraryFileUpload::make('pic')
                ->avatar()
                ->label('Photo')
                ->visibility('private')
                ->collection('member-avatar')
                ->maxFiles(1)
                ->maxSize(1024 * 1024 * 10),
        ];
    }
}
