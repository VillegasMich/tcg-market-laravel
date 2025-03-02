<?php

// AUTHOR: Manuel Villegas Michel

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TCGPack extends Model
{
    use HasFactory;

    /**
     * $this->atributes['id'] - int - Product primary key
     * $this->atributes['name'] - string - Collection name
     * $this->atributes['image'] - string - Collection image
     * $this->atributes['tcgCards'] - array - Collection of cards
     */
    public function tcgCards(): BelongsToMany
    {
        return $this->belongsToMany(TCGCard::class);
    }

    protected $fillable = [
        'name',
        'image',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setName(string $collection): void
    {
        $this->attributes['name'] = $collection;
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getTcgCards(): array
    {
        return $this->attributes['tcgCards'];
    }

    public function setTcgCards(array $tcgCards): void
    {
        $this->attributes['tcgCards'] = $tcgCards;
    }
}
